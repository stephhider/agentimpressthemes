import Vue from 'vue'
import {mapState} from 'vuex'

/**
 * Search Info
 *
 * @return {Vue Component}
 */
export default Vue.component('search-info', {
    data () {
        return {
            readable: {
                location: 'Location',
                maxarea: 'Max Area',
                maxbaths: 'Max Baths',
                maxbeds: 'Max Beds',
                maxprice: 'Max Price',
                minarea: 'Min. Area',
                minbaths: 'Min. Baths',
                minbeds: 'Min. Beds',
                minprice: 'Min. Price',
                sort: 'Filter',
                agent: 'Agent',
                brokers: 'Brokers',
                type: 'Type',
                mls: 'MLS#',
                neighborhood: 'Neighborhood'
            }
        }
    },
    computed: mapState({
        loading: state => state.search.loading,
        queryData: state => state.search.queryData,
        readableQueryData: state => state.search.readableQueryData,
        showInfoMessage: state => state.search.showInfoMessage,
        total: state => state.search.total
    }),
    methods: {
        /**
         * Removes the visual tag from the search information
         * section. It will also re-submit the search to
         * reflect this change.
         *
         * @param  {string} param
         */
        removeParameter: function (param) {
            const vm = this

            vm.$store.commit('DELETE_QUERY_PARAM', param)

            // Update URL to reflect search
            let urlQueryData = getUrlQueryStringParameters()

            delete urlQueryData[param]

            let urlQueryDataString = $.param(urlQueryData);

            if (urlQueryDataString != '') {
                urlQueryDataString = '?' + urlQueryDataString
            }

            window.history.replaceState('Search', 'Search', '/search' + urlQueryDataString)

            // Reset variables for a fresh search
            vm.$store.commit('SET_TOTAL', 0)
            vm.$store.commit('SET_OFFSET', 0)
            vm.$store.commit('SET_LISTINGS', [])
            vm.$store.commit('SET_QUEUED', [])
            vm.$store.commit('SET_SHOW_INFO_MESSAGE', false)

            vm.$store.dispatch('getListings', true)
        }
    }
})
