{{-- Nav Link --}}
@push('main-menu')
<li><a class="page-scroll" href="#listing-maps">Maps</a></li>
@endpush
<section id="listing-maps" class="main-section">
    <div class="wow fadeIn">
        <div class="container">
            <h2 class="section-heading">{{ $listing_type or 'Listing' }} <strong>Maps</strong> <br>
                <small>Visualize your day-to-day with interactive maps</small>
            </h2>
        </div>
        @if (!Agent::isMobile())
            @include('listings.partials.maps.view-desktop')
        @else
            @include('listings.partials.maps.view-mobile')
        @endif
    </div>
    <div class="hide">
        <div id="map-primary-color"></div>
        <div id="map-secondary-color"></div>
        <div id="map-water-color"></div>
        <div id="map-road-color"></div>
        <div id="map-text-color"></div>
    </div>
</section>
