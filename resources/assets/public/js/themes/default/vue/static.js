var Vue = require('vue');
var VueLazyload = require('vue-lazyload');
var ListingWells = require('./components/listing-well');

Vue.use(VueLazyload);

var vm = new Vue({
    el: '#app'
});