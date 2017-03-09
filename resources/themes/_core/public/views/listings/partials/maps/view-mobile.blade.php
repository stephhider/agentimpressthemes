<div class="container">
    <div class="m-b-10">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#street-view-mobile">
            <i class="fa fa-street-view" aria-hidden="true"></i> Street View
        </button>
    </div>
    {{--<div class="m-b-10">--}}
        {{--<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#life-view-mobile">--}}
            {{--<i class="fa fa-building" aria-hidden="true"></i> Lifestyle View--}}
        {{--</button>--}}
    {{--</div>--}}
    <div class="m-b-10">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#yelp-view-mobile">
            <i class="fa fa-yelp" aria-hidden="true"></i> Yelp View
        </button>
    </div>
</div>
<div class="hide">
    @include('listings.partials.maps.maps.street-map')
</div>
@push('modals')
<div class="modal bottom full-screen fade listing-mobile-map" id="street-view-mobile" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @include('listings.partials.maps.maps.panorama-map')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
<div class="modal bottom full-screen fade listing-mobile-map" id="life-view-mobile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-inline listing-mobile-map-form">
                <input type="hidden" class="form-control" id="add-name-input" value="Marker">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="add-address-input" placeholder="Address" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" id="add-address">
                                        <i class="fa fa-plus"></i> Add Marker
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @include('listings.partials.maps.maps.lifestyle-map')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
<div class="modal bottom full-screen fade listing-mobile-map" id="yelp-view-mobile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="yelp-form" class="form-inline listing-mobile-map-form" onsubmit="return false;">
                <input type="hidden" id="yelp-limit" name="yelp-limit" value="5">
                <input type="hidden" id="yelp-latlng" name="yelp-latlng" value="{{ $listing->latitude }},{{ $listing->longitude }}">
                <input type="hidden" id="yelp-location" name="yelp-location" value="{{ $listing->city }}+{{ $listing->state }}+{{ $listing->zip }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" id="yelp-term" name="yelp-term" placeholder="Search Yelp Term" value="Restaurants">
                                <span class="input-group-btn">
                                    <button type="submit" id="yelp-submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Search
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @include('listings.partials.maps.maps.yelp-map')
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>
@endpush

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var maps = new Maps();

        var streetview = maps.StreetView.init('#street-map-element', '{{ $listing->latitude }}', '{{ $listing->longitude }}');
        var lifestyleview = maps.LifestyleView.init('#lifestyle-map-element', '{{ $listing->latitude }}', '{{ $listing->longitude }}');
        var yelpview = maps.YelpView.init('#yelp-map-element', '{{ $listing->latitude }}', '{{ $listing->longitude }}');
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById('add-address-input'), {
            types: ["geocode"]
        });

        autocomplete.bindTo('bounds', lifestyleview.map.map);

        $('#add-address').on("click", function (e) {
            e.preventDefault();
            var name = $('#add-name-input').val();
            var address = $('#add-address-input').val();

            lifestyleview.add(name, address);
        });

        {{-- Switch to Street View --}}
        $("#street-view-mobile").on("shown.bs.modal", function () {
            if (!streetview) {
                streetview = maps.StreetView.init('#street-map-element', '{{ $listing->latitude }}', '{{ $listing->longitude }}');
            } else {
                maps.refresh(streetview, true);
            }
        });

        {{-- Switch to Locations View --}}
        $("#life-view-mobile").on("shown.bs.modal", function () {
            if (!lifestyleview) {
                lifestyleview = maps.LifestyleView.init('#lifestyle-map-element', '{{ $listing->latitude }}', '{{ $listing->longitude }}');
            } else {
                maps.refresh(lifestyleview);
            }
        });

        {{-- Switch to Yelp View --}}
        $("#yelp-view-mobile").on("shown.bs.modal", function () {
            if (!yelpview) {
                yelpview = maps.YelpView.init('#yelp-map-element', '{{ $listing->latitude }}', '{{ $listing->longitude }}');
            } else {
                maps.refresh(yelpview);
            }

            $("#yelp-form").on("submit", function () {
                yelpview.getData();
            });
        });

        $("#yelp-submit").click(function (e) {
            $.cookie('yelp-term', $('#yelp-term').val(), {expires: 1});
        });
    });

</script>
@endpush
