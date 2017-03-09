import Vue from 'vue'

export default {
    state: {
        total: 0,
        listings: [],
        queued: [],
        queryData: {},
        readableQueryData: {},
        loading: false,
        addedCount: 0,
        row: 3,
        limitOffset: 4,
        offset: 12,
        showInfoMessage: false,
        initialListingsLoaded: true
    },
    mutations: {
        SET_TOTAL (state, total) {
            state.total = parseInt(total)
        },
        SET_LISTINGS (state, listings) {
            state.listings = listings
        },
        SET_QUERY_DATA (state, data) {
            state.queryData = data
        },
        SET_READABLE_QUERY_DATA (state, data) {
            state.readableQueryData = data
        },
        SET_LOADING (state, loading) {
            state.loading = loading
        },
        SET_ADDED_COUNT (state, count) {
            state.addedCount = count
        },
        SET_OFFSET (state, offset) {
            state.offset = offset
        },
        SET_SHOW_INFO_MESSAGE (state, show) {
            state.showInfoMessage = !!show
        },
        INCREMENT_OFFSET (state, amount) {
            state.offset += amount
        },
        SET_ROW (state, row) {
            state.row = row
        },
        SET_QUEUED (state, listings) {
            state.queued = listings
        },
        ADD_LISTING (state, listing) {
            state.listings.push(listing)
        },
        QUEUE_LISTINGS (state, listings) {
            listings.map(listing => {
                state.queued.push(listing)
            })
        },
        DELETE_QUERY_PARAM (state, param) {
            Vue.delete(state.queryData, param)
            Vue.delete(state.readableQueryData, param)
        }
    },
    getters: {
        allListingsLoaded: state => {
            return state.listings.length == state.total;
        },
        limit: state => {
            return state.row * state.limitOffset
        }
    },
    actions: {
        getListings ({commit, state, dispatch}, update) {
            // show loading indicator
            commit('SET_LOADING', true)

            // sets post url
            let url = window.location.origin + window.location.pathname
            let data = state.queryData

            // sets offset to get next group of listings
            data.offset = state.offset;
            // sets post queryData limit
            data.limit = state.row * state.limitOffset

            return Vue.http.post(url, data).then(response => {
                // hide loading indicator
                commit('SET_LOADING', false)

                // get results
                let total = response.body.total
                let listings = JSON.parse(response.body.listings)

                commit('INCREMENT_OFFSET', listings.length)
                commit('SET_TOTAL', total)
                commit('QUEUE_LISTINGS', listings)

                if (update) {
                    dispatch('updateListings')
                }
            })
        },
        updateListings ({state, commit, dispatch, getters}) {
            let removed
            let isNewListing = false

            if (!state.initialListingsLoaded) {
                commit('SET_ADDED_COUNT', 0)

                let queuedLength = state.queued.length

                if (queuedLength - getters.limit == 0) {
                    removed = state.queued.splice(0, (getters.limit / 2))
                } else {
                    removed = state.queued.splice(0, (queuedLength - getters.limit))
                }
            } else {
                removed = state.queued.splice(0, state.row * (state.limitOffset / 2))
                state.addedCount += removed.length
                isNewListing = true
            }

            if (!state.showInfoMessage) {
                commit('SET_SHOW_INFO_MESSAGE', true)
            }

            removed.map((listing, index) => {
                listing.delay = index
                listing.added = isNewListing
                listing.view_listing_class = 'col-sm-8'

                state.listings.push(listing)
            })

            if ((state.queued.length == (getters.limit / 2))) {
                dispatch('getListings', false)
            }
        }
    }
}
