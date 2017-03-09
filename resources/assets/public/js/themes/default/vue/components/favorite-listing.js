var Vue = require('vue');
var VueResource = require('vue-resource');
var Message = require('../../../../../../admin/js/vue/partials/messenger');

Vue.use(VueResource);

var CSRFToken = document.querySelector('meta[name="_token"]').getAttribute('content');

Vue.http.options.emulateHTTP = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = CSRFToken;

module.exports = Vue.component('favorite-listing', {
    props: [
        'action',
        'favorited',
        'id',
        'is_mls',
        'vendor',
        'authorized'
    ],
    computed: {
        icon: function () {
            return this.favorited
                ? 'fa-heart'
                : 'fa-heart-o'
        },
        title: function () {
            return this.favorited
                ? 'Un Save'
                : 'Save'
        }
    },
    template: '<a class="listing-like tooltipper" v-on:click="toggle" v-bind:title="title" data-container="body" data-toggle="modal"><i v-bind:class="[\'fa\', icon]"></i></a>',
    methods: {
        toggle: function () {
            if (this.authorized) {
                this.favorited = !this.favorited;

                this.$http.post(this.action, {
                    listing_id: parseInt(this.id),
                    is_mls: this.is_mls,
                    vendor: this.vendor,
                    featured: this.featured
                }).then(function () {
                    this.saveComplete('success', 'Listing updated!');
                }, function () {
                    this.saveComplete('error', 'Unable to favorite listing...');
                });
            } else {
                $('#lead-login-modal').modal('show');
            }
        },
        saveComplete: function (type, messages) {
            if (typeof messages === 'string') {
                Message(type, messages);
            } else {
                for (var key in messages) {
                    if (messages.hasOwnProperty(key)) {
                        Message(type, messages[key]);
                    }
                }
            }
        }
    }
});
