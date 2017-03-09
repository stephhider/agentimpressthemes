import Vue from 'vue'
import {mapState} from 'vuex'

/**
 * Search Form
 *
 * @return {Vue Component}
 */
export default Vue.component('search-form', {
    props: ['cities', 'show_results'],
    data () {
        return {
            citiesSelector: '.cities',
            filters: {
                '-listprice': {
                    label: 'Price (Highest - Lowest)',
                    order: 'desc'
                },
                'listprice': {
                    label: 'Price (Lowest - Highest)',
                    order: 'asc'
                },
                '-listdate': {
                    label: 'Age (Newest - Oldest)',
                    order: 'desc'
                },
                'listdate': {
                    label: 'Age (Oldest - Newest)',
                    order: 'asc'
                },
                '-beds': {
                    label: 'Beds (Most - Least)',
                    order: 'desc'
                },
                'beds': {
                    label: 'Beds (Least - Most)',
                    order: 'asc'
                },
                '-baths': {
                    label: 'Baths (Most - Least)',
                    order: 'desc'
                },
                'baths': {
                    label: 'Baths (Least - Most)',
                    order: 'asc'
                }
            },
            sort: {
                label: 'Filter',
                icon: 'fa-filter'
            },
            type: '',
            type_text: 'All',
        }
    },
    created () {
        const vm = this

        // We don't need if just showing the form
        if (vm.show_results) {
            // get any url query data
            let queryStringData = getUrlQueryStringParameters()

            // TODO: Possibly refactor or move setQueryData to Store
            if (typeof queryStringData != 'undefined') {
                vm.setQueryData(queryStringData)

                // TODO: Set search type
                if (typeof queryStringData.type != 'undefined') {
                    vm.setSearchType(queryStringData.type)
                }
                // Set filter button icon and text based on session query data
                if (typeof queryStringData.sort != 'undefined') {
                    let filter = vm.filters[queryStringData.sort]

                    vm.sort.icon = 'fa-sort-amount-' + filter.order
                    vm.sort.label = 'Sorted by ' + filter.label
                }

            } else {
                vm.setQueryData({})
            }
        }
    },
    mounted () {
        const vm = this

        vm.initPlugins()
    },
    computed: {
        ...mapState({
            limit: state => state.search.limit,
            limitOffset: state => state.search.limitOffset,
            queryData: state => state.search.queryData
        })
    },
    methods: {
        /**
         * Toggles the search type
         *
         * @param  {Event} e
         */
        toggleSearchType (e) {
            const vm = this

            let type = e.target.getElementsByTagName('input')[0].value;

            vm.setSearchType(type)
        },
        /**
         * Sets the search type
         *
         * @param {string} type
         */
        setSearchType (type) {
            const vm = this

            let queryData = vm.queryData

            switch (type) {
                case 'residential':
                    queryData.type = type
                    vm.type = type
                    vm.type_text = 'For Sale'
                    break;
                case 'rental':
                    queryData.type = type
                    vm.type = type
                    vm.type_text = 'For Rent'
                    break;
                default:
                    vm.$store.commit('DELETE_QUERY_PARAM', 'type')
                    vm.type = ''
                    vm.type_text = 'All'
                    break;
            }

            vm.setQueryData(queryData)
        },
        /**
         * Changes the search filter
         *
         * @param  {string} value
         */
        filter (value) {
            const vm = this

            let queryData = vm.queryData

            if (value) {
                let filter = vm.filters[value]

                // Set filter button text and icon
                vm.sort.icon = 'fa-sort-amount-' + filter.order
                vm.sort.label = 'Sorted by ' + filter.label

                queryData.sort = value
            } else {
                vm.sort.label = 'Filter'
                vm.sort.icon = 'fa-filter'

                vm.$store.commit('DELETE_QUERY_PARAM', 'sort')
            }

            vm.setQueryData(queryData)
        },
        /**
         * Performs form search
         *
         * @param  {Event} e
         * @param  {Object} data
         */
        search (e, data) {
            const vm = this

            let form = e

            if (e != null) {
                // Turn form data into an object
                form = e.target
                let formData = JSON.parse(JSON.stringify($(form).serializeObject()))

                if (formData.hasOwnProperty('type') && formData.type != '') {
                    formData.status = 'active'
                }

                if (vm.queryData.hasOwnProperty('sort')) {
                    formData.sort = vm.queryData.sort
                }

                let urlQueryDataString = vm.setQueryData(formData)

                if (!vm.show_results) {
                    window.location = '/search' + urlQueryDataString
                    return false
                }
            }

            vm.resetSearchForm(form)

            vm.$store.dispatch('getListings', true)
        },
        /**
         * Resets the search form to prepare for
         * a fresh search
         *
         * @param  {DomNode} form
         */
        resetSearchForm (form) {
            const vm = this

            vm.$store.commit('SET_TOTAL', 0)
            vm.$store.commit('SET_OFFSET', 0)
            vm.$store.commit('SET_LISTINGS', [])
            vm.$store.commit('SET_QUEUED', [])
            vm.$store.commit('SET_SHOW_INFO_MESSAGE', false)

            // if (form != null) {
            //     form.reset()
            // }

            // $(vm.citiesSelector).tagsinput('removeAll');

            // $('#advanced-search-modal').modal('hide');
        },
        /**
         * Set the query data object
         *
         * @param {Objec} data
         */
        setQueryData (data) {
            const vm = this

            let excludedFields = ['limit', 'offset', 'active']

            let queryData = {}
            let urlQueryData = {}
            let readableQueryData = {}

            for (let key in data) {
                if (data.hasOwnProperty(key)) {
                    if (data[key] != '') {

                        queryData[key] = vm.cleanIfNumericValue(key, data[key])

                        if (excludedFields.indexOf(key) == -1) {

                            urlQueryData[key] = vm.cleanIfNumericValue(key, data[key])

                            if (key != 'sort' && key != 'status' && key != 'type') {
                                readableQueryData[key] = data[key]
                            }
                        }
                    }
                }
            }

            vm.$store.commit('SET_QUERY_DATA', queryData);
            vm.$store.commit('SET_READABLE_QUERY_DATA', readableQueryData);

            let urlQueryDataString = $.param(urlQueryData);

            if (urlQueryDataString != '') {
                urlQueryDataString = '?' + urlQueryDataString
            }

            // Update URL to reflect search
            if (vm.show_results) {
                window.history.replaceState('Search', 'Search', '/search' + urlQueryDataString)
            }

            return urlQueryDataString
        },
        /**
         * If the value is a numeric field we
         * remove all non numeric characters
         *
         * @param  {string} key
         * @param  {string} value
         * @return {string}
         */
        cleanIfNumericValue (key, value) {
            let numericFields = [
                'maxarea',
                'maxbaths',
                'maxbeds',
                'maxprice',
                'minarea',
                'minbaths',
                'minbeds',
                'minprice'
            ]

            return (numericFields.indexOf(key) != -1) ? value.replace('/\D/g', '') : value
        },
        /**
         * Initialize jQuery Plugins
         *
         * @return {void}
         */
        initPlugins () {
            const vm = this
            let cities = JSON.parse(vm.cities)

            let $cities = $(vm.citiesSelector)
            let $bootstrapTagsInputInput = $('.bootstrap-tagsinput input')

            $cities.tagsinput({
                typeahead: {
                    afterSelect: function (val) {
                        this.$element.val('')
                    },
                    source: cities,
                    classNames: {
                        input: 'form-control',
                        menu: 'dropdown-menu',
                        selectable: 'selectable'
                    },
                    hint: true,
                    highlight: true,
                    minLength: 1
                }
            });

            $bootstrapTagsInputInput.on('keypress', function (e) {
                if (e.keyCode == 13) {
                    let form = $('form')
                    form[0].submit()
                }
            })

            $cities.on('beforeItemAdd', function (event) {
                let type = event.target.value.split(',').shift()

                if (type != '') {
                    if (isNaN(event.item)) {
                        if (isNaN(type)) {
                            if (cities.indexOf(event.item) == -1) {
                                event.cancel = true
                            }
                        } else {
                            event.cancel = true
                        }
                    } else {
                        if (isNaN(type)) {
                            event.cancel = true
                        }
                    }
                }
            })
        }
    }
})
