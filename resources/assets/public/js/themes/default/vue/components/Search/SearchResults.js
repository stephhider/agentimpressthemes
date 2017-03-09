import Vue from 'vue'
import {mapGetters, mapState} from 'vuex'

export default Vue.component('search-results', {
    props: ['initial_listings', 'initial_total'],
    data () {
        return {
            resolution: {},
            screenWidth: 0
        }
    },
    mounted () {
        const vm = this

        vm.setResolution()
        vm.setScreenWidth()
        vm.setColumnSize()

        if (vm.initial_listings) {
            let listings = JSON.parse(vm.initial_listings)
            // TODO: Need to load all the listings...
            // Should this be checked against scroll position?
            vm.$store.commit('QUEUE_LISTINGS', listings)
            vm.$store.dispatch('updateListings', true)
        }

        if (vm.initial_total) {
            vm.$store.commit('SET_TOTAL', vm.initial_total)
        }

        $(window).scroll(function () {
            if (!vm.allListingsLoaded) {
                vm.updateListingsBasedOnWindowHeight()
            }
        })

        $(window).resize(function () {
            let currentWidth = vm.screenWidth

            vm.setScreenWidth()

            if (currentWidth != vm.screenWidth) {
                vm.setColumnSize()
            }

        })
    },
    computed: {
        ...mapGetters([
            'allListingsLoaded',
            'limit'
        ]),
        ...mapState({
            addedCount: state => state.search.addedCount,
            limitOffset: state => state.search.limitOffset,
            listings: state => state.search.listings,
            loading: state => state.search.loading,
            queryData: state => state.search.queryData,
            row: state => state.search.row,
            total: state => state.search.total
        }),
        listingsStatusClass () {
            const vm = this

            if (vm.loading) {
                return 'loading'
            }

            return 'not-loaded'
        },
        showDomMessage () {
            const vm = this

            if (vm.queryData.hasOwnProperty('agent')) {
                return false
            } else if (vm.queryData.hasOwnProperty('brokers')) {
                return false
            }

            return true;
        }
    },
    methods: {
        updateListings (e) {
            const vm = this

            vm.$store.dispatch('updateListings', true)

            this.$nextTick(function () {
                $('.no-touch .tooltipper').tooltip()
            })
        },
        /**
         * Updates listings when the user scrolls
         */
        updateListingsBasedOnWindowHeight () {
            const vm = this

            let scrollTop = $(window).scrollTop()

            sessionStorage.setItem('position', scrollTop)

            if ((vm.addedCount % (vm.limit * vm.limitOffset)) != 0) {
                vm.updateListings()
            }
        },
        /**
         * Set the current screen resolution
         */
        setResolution () {
            const vm = this

            const el = document.getElementById('search-results')

            if (typeof el != 'undefined') {
                let sizes = ['xs', 'sm', 'md', 'lg', 'xl']

                for (let i = 0; i < sizes.length; i++) {
                    let size = sizes[i]
                    let values = el.dataset[size].split('-')

                    vm.resolution[size] = {
                        amount: values[0],
                        width: values[1]
                    }
                }
            }
        },
        /**
         * Set the current width of the screen
         */
        setScreenWidth () {
            const vm = this

            let e = document.documentElement
            let g = document.getElementsByTagName('body')[0]

            vm.screenWidth = window.innerWidth || e.clientWidth || g.clientWidth
        },
        /**
         * Get the column size to properly fit listings
         *
         * @return {void}
         */
        setColumnSize () {
            const vm = this

            let row

            if (typeof vm.resolution != 'undefined') {
                if (vm.screenWidth > vm.resolution.lg.width) {
                    // extra large
                    row = vm.resolution.xl.amount
                } else if (vm.screenWidth <= vm.resolution.lg.width && vm.screenWidth > vm.resolution.md.width) {
                    // large
                    row = vm.resolution.lg.amount
                } else if (vm.screenWidth <= vm.resolution.md.width && vm.screenWidth > vm.resolution.sm.width) {
                    // medium
                    row = vm.resolution.md.amount
                } else if (vm.screenWidth <= vm.resolution.sm.width && vm.screenWidth > vm.resolution.xs.width) {
                    // small
                    row = vm.resolution.sm.amount
                } else if (vm.screenWidth < vm.resolution.sm.width) {
                    // extra small
                    row = vm.resolution.xs.amount
                }

                if (vm.row != row) {
                    vm.$store.commit('SET_ROW', parseInt(row))
                }
            }
        }
    }
})
