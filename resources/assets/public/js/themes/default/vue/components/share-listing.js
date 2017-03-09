var Vue = require('vue');

module.exports = Vue.component('share-listing', {
    props: ['action', 'id', 'url', 'authorized'],
    template: '<a class="col-sm-2 btn btn-primary listing-share tooltipper" data-container="body" title="Share Listing" data-toggle="modal" v-bind:data-target="target" v-bind:data-listing-id="id" v-bind:data-listing-url="url"><i class="fa fa-share-alt"></i></a>',
    computed: {
        target: function () {
            return (this.authorized) ? '#listing-share' : '#lead-login-modal';
        }
    }
});
