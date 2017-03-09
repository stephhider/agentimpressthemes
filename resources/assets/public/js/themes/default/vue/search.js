import Vue from 'vue'
import Vuex from 'vuex'
import VueResource from 'vue-resource'
import VueAsyncData from 'vue-async-data'
import VueLazyload from 'vue-lazyload'

var _ = require('lodash');

var ShareListing = require('./components/share-listing');
var FavoriteListing = require('./components/favorite-listing');

Vue.use(Vuex)
Vue.use(VueResource)
Vue.use(VueAsyncData)
Vue.use(VueLazyload)

var CSRFToken = document.querySelector('meta[name="_token"]').getAttribute('content');

Vue.http.options.emulateHTTP = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = CSRFToken;

Vue.filter('capitalize', function (value) {
    return _.startCase(_.toLower(value));
});

import store from './vuex/store';
import { mapState } from 'vuex'
import SearchForm from './components/Search/SearchForm'
import SearchResults from './components/Search/SearchResults'
import SearchInfo from './components/Search/SearchInfo'

var vm = new Vue({
    el: '#app',
    store: store,
    components: {
        SearchForm, SearchInfo, SearchResults
    }
})
