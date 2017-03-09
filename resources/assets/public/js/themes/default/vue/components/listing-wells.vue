<template>
    <div class="col-sm-6 col-lg-4" v-bind:class="{'wow': listing.added, 'fadeIn': listing.added}" v-for="listing in listings" v-bind:data-wow-delay="'.' + listing.delay + 's'>
        <div class="listing-popovers"></div>
        <div class="listing-well no-hover">
            <div class="img-container">
                <div class="loader">
                    <div class="signal-loader"></div>
                </div>
                <noscript>
                    <img class="img-responsive" v-bind:src="listing.photo_preview">
                </noscript>
                <div class="img-responsive-holder">
                    <img class="img-responsive img-lazy" v-lazy="{src: listing.photo_preview, loading: listing.photo_loading}">
                </div>
            </div>
            <ul class="left-labels list-unstyled">
                <li class="dom" v-if="listing.dom == 0"><span class="label">Just Listed Today</span></li>
                <li class="status"><span class="label">{{ listing.status }}</span></li>
                <li class="price"><span class="label">{{ listing.price_formatted }}</span></li>
                <li class="tour" v-if="listing.has_tour"><span class="label">3D-Tour</span></li>
                <li class="favorite" v-if="listing.favorited"><span class="label">Favorite</span></li>
            </ul>
            <div class="row-fluid listing-specs">
                <div class="col-xs-4 beds"><span><strong> {{ listing.bedrooms }}</strong></span><br>
                    <small>BED</small>
                </div>
                <div class="col-xs-4 baths"><span><strong> {{ listing.total_baths }} </strong></span><br>
                    <small>BATH</small>
                </div>
                <div class="col-xs-4 sqft"><span><strong> {{ listing.sqft_formatted }}</strong></span><br>
                    <small>SQFT</small>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="listing-content">
                <div class="listing-content-well">
                    <ul class="list-unstyled listing-details">
                        <li class="title"><p>
                            <strong>{{ listing.title }}</strong> {{ listing.city }}, {{ listing.state }} {{ listing.zip }}
                        </p></li>
                        <li class="description"><p v-html="listing.description"></p></li>
                    </ul>
                    <div class="bottom">
                        <ul class="list-unstyled listing-disclaimer" v-if="listing.disclaimer">
                            <li><strong>Agent:</strong> <a href="#">{{ listing.disclaimer.agent }}</a></li>
                            <li><strong>Broker:</strong> <a href="#">{{ listing.disclaimer.broker }}</a></li>
                        </ul>
                        <ul class="list-unstyled listing-actions">
                            <li>
                                <div class="btn-group btn-block" role="group">
                                    <a class="col-sm-8 btn btn-primary view-listing " v-bind:href="listing.url" role="button">View {{ $listing_type }}</a>
                                    <a class="col-sm-2 btn btn-primary listing-share tooltipper" data-container=".listing-popovers" data-title="Share Listing" data-toggle="modal" data-listing-id="#" data-listing-url="#"><i class="fa fa-share-alt"></i></a>
                                    <a class="col-sm-2 btn btn-primary listing-like tooltipper" data-container=".listing-popovers" data-title="Like Listing" data-toggle="modal" data-target="#loginModal"><i class="fa fa-heart-o"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    module.exports = {
        props: ['listings'],
        created: function () {
            this.listings = JSON.parse(this.listings);
        }
    }
</script>
