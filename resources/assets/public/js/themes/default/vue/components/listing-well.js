var Vue = require('vue');
var ShareListing = require('./share-listing');
var FavoriteListing = require('./favorite-listing');

module.exports = Vue.component('listing-wells', {
    props: [
        'initialListings', 'authorized'
    ],
    data: function () {
        return {
            showDomMessage: true
        }
    },
    created: function() {
        this.listings = JSON.parse(this.initialListings);

        for (var key in this.listings) {
            if (this.listings.hasOwnProperty(key)) {
                Vue.set(this.listings[key], 'added', true);
                Vue.set(this.listings[key], 'delay', 5);
                Vue.set(this.listings[key], 'view_listing_class', 'col-sm-6');
            }
        }

        this.$nextTick(function() {
            $('.no-touch .tooltipper').tooltip();
        });
    }
});
