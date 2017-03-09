<div>
    <div class="{{ $listing_well_class or 'col-sm-6 col-md-4 wow fadeIn'}}" :class="{'listing-loaded': listing.added }" v-for="listing in listings" :data-wow-delay="'.' + listing.delay + 's'">
        <div class="listing-popovers"></div>
        <div class="listing-well">
            <div class="listing-hover">
                <div class="listing-img-container lazy-wrap ratio thumb">
                    <span class="lazy-preloader"></span>
                    <img class="lazy-content content" v-lazy="{src: listing.photo_preview, loading: listing.photo_loading, error: listing.photo_error}">
                </div>
                <ul class="left-labels list-unstyled">
                    <li v-if="showDomMessage && (listing.dom < 7 && listing.show_dom_message)" class="dom" :class="listing.dom_message_class">
                        <span class="label">@{{ listing.dom_message }}</span></li>
                    <li class="status"><span class="label">@{{ listing.status }}</span></li>
                    <li class="price"><span class="label">@{{ listing.price_formatted }}</span></li>
                    <li class="tour" v-if="listing.has_tour"><span class="label">3D-Tour</span></li>
                </ul>
                <span class="favorite-btn"><favorite-listing action="{{ route('toggle.favorite') }}" :favorited="listing.is_favorite" :id.once="listing.id" :is_mls.once="listing.is_mls" :vendor.once="listing.vendor" authorized="{{ $authorized }}"></favorite-listing></span>
                <div class="listing-content">
                    <div class="listing-content-well">
                        <ul class="details list-unstyled">
                            <li class="title">
                                <strong>@{{ listing.address }} @{{ listing.city }}, @{{ listing.state }} @{{ listing.zip }}</strong>
                            </li>
                            <li class="description">
                                <p v-html="listing.short_description"></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row-fluid listing-specs">
                <div class="col-xs-4 beds"><span><strong> @{{ listing.bedrooms }}</strong></span><br>
                    <small>BED</small>
                </div>
                <div class="col-xs-4 baths"><span><strong> @{{ listing.total_baths }} </strong></span><br>
                    <small>BATH</small>
                </div>
                <div class="col-xs-4 sqft"><span><strong> @{{ listing.sqft_formatted }}</strong></span><br>
                    <small>SQFT</small>
                </div>
                <div class="clearfix"></div>
                <div v-if="listing.disclaimer && listing.disclaimer.agent_id && listing.disclaimer.broker" class="disclaimer">
                    {{ $listing_type }} by
                    <a :href="'{{ url('search?agent=') }}' + listing.disclaimer.agent_id">@{{ listing.disclaimer.agent }}</a> of
                    <a :href="'{{ url('search?brokers=') }}' + listing.disclaimer.broker_id">@{{ listing.disclaimer.broker }}</a>
                </div>
            </div>
            <a class="view-listing-btn" v-bind:href="'{{ url('/') }}/' + listing.url" role="button">View {{ $listing_type }}</a>
        </div>
        {{-- Scripts --}}
        @push('scripts')
        <script>
            $('#listing-share').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var listingId = button.data('listing-id');
                var listingUrl = button.data('listing-url');

                var modal = $(this);
                modal.find('#listing-id').val(listingId);
                modal.find('#listing-url').val(listingUrl);
                var socials = modal.find('[data-type]');

                socials.each(function () {
                    this.href = this.href + listingUrl;
                });
            })
        </script>
        @endpush
    </div>
</div>