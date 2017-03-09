<div class="container">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a id="street-map" class="street-view" href="#street-view" aria-controls="street-view" role="tab" data-toggle="tab"><i class="fa fa-street-view" aria-hidden="true"></i> Street View</a>
        </li>
        <li role="presentation">
            <a id="locations-map" class="lifestyle-view" href="#lifestyle-view" aria-controls="lifestyle-view" role="tab" data-toggle="tab"><i class="fa fa-building" aria-hidden="true"></i> Lifestyle View</a>
        </li>
        <li role="presentation">
            <a id="yelp-map" class="yelp-view" href="#yelp-view" aria-controls="yelp-view" role="tab" data-toggle="tab"><i class="fa fa-yelp" aria-hidden="true"></i> Yelp View</a>
        </li>
    </ul>
</div>
<div class="tab-content">
    <div role="tabpanel" id="street-view" class="map-section tab-pane active">
        <div class="map-title-section">
            <div class="container">
                <h3 class="subsection-heading"><i class="fa fa-street-view" aria-hidden="true"></i> Street View <br>
                    <small>Tour the block or neighborhood virtually.</small>
                </h3>
            </div>
        </div>
        <div class="map-section">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="col-sm-6 left lazy-wrap">
                        <span class="lazy-preloader"></span>
                        @include('listings.partials.maps.maps.street-map')
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-sm-6 right lazy-wrap">
                        <span class="lazy-preloader"></span>
                        @include('listings.partials.maps.maps.panorama-map')
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="map-section tab-pane" id="lifestyle-view">
        <div class="map-title-section">
            <div class="container">
                <h3 class="subsection-heading"><i class="fa fa-building" aria-hidden="true"></i> Lifestyle View <br><small>Can you walk to work? Is it near Billy’s soccer practice? You import the address; we’ll tell you the distance...</small></h3>
                <form class="form-inline">
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-name-input" placeholder="Marker Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="add-address-input" placeholder="Address" autocomplete="off">
                    </div>
                    <button class="btn btn-primary" id="add-address">
                        <i class="fa fa-plus"></i> Add Marker
                    </button>
                </form>
            </div>
        </div>
    	<div class="map-section">
            @include('listings.partials.maps.maps.lifestyle-map')
    	</div>
    </div>
    <div role="tabpanel" id="yelp-view" class="map-section tab-pane">
        <div class="map-title-section">
            <div class="container">
                <h3 class="subsection-heading"><i class="fa fa-yelp" aria-hidden="true"></i> Yelp View <br>
                    <small>Restaurants, grocery stores, gyms and more. How close are they? Let Yelp tell you.</small>
                </h3>
                <form id="yelp-form" class="form-inline" onsubmit="return false;">
                    <input type="hidden" id="yelp-limit" name="yelp-limit" value="5">
                    <input type="hidden" id="yelp-latlng" name="yelp-latlng" value="{{ $listing->latitude }},{{ $listing->longitude }}">
                    <input type="hidden" id="yelp-location" name="yelp-location" value="{{ $listing->city }}+{{ $listing->state }}+{{ $listing->zip }}">
                    <div class="form-group">
                        <input type="text" class="form-control" id="yelp-term" name="yelp-term" placeholder="Search Yelp Term" value="Restaurants">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="yelp-submit" class="btn btn-primary">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="map-form-section">
            <div class="map-section">
                @include('listings.partials.maps.maps.yelp-map')
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
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
        $('a.street-view').on('shown.bs.tab', function () {
            if (!streetview) {
                streetview = maps.StreetView.init('#street-map-element', '{{ $listing->latitude }}', '{{ $listing->longitude }}');
            } else {
                maps.refresh(streetview, true);
            }
        });

        {{-- Switch to Locations View --}}
        $('a.lifestyle-view').on('shown.bs.tab', function () {
            if (!lifestyleview) {
                lifestyleview = maps.LifestyleView.init('#lifestyle-map-element', '{{ $listing->latitude }}', '{{ $listing->longitude }}');
            } else {
                maps.refresh(lifestyleview);
            }
        });

        {{-- Switch to Yelp View --}}
        $('a.yelp-view').on('shown.bs.tab', function () {
            if (!yelpview) {
                yelpview = maps.YelpView.init('#yelp-map-element', '{{ $listing->latitude }}', '{{ $listing->longitude }}');
            } else {
                maps.refresh(yelpview);
            }

            $("#yelp-form").on("submit", function () {
                yelpview.getData();
            });
        });

        $("ul a").click(function () {
            $.cookie('map-tab', $(this).attr('id'), {expires: 1});
        });
        $("#yelp-submit").click(function (e) {
            $.cookie('yelp-term', $('#yelp-term').val(), {expires: 1});
        });

        $(document).ready(function () {
            $('#listing-maps a#' + $.cookie("map-tab")).tab('show');
        });
    })

</script>
@endpush
