import Vue from 'vue'
import Vuex from 'vuex'
import VueLazyload from 'vue-lazyload'
import ListingWells from './components/listing-well'
import SearchForm from './components/Search/SearchForm'
import store from './vuex/store'

Vue.use(Vuex)
Vue.use(VueLazyload)

const vm = new Vue({
    el: '#app',
    store: store,
    components: {
        SearchForm
    }
})
