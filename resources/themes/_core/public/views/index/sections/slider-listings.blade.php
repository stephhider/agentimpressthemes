@if(!$featured_listings->isEmpty())
    {{-- Nav Link --}}
    @push('main-menu')
    <li><a class="page-scroll" href="#index-slider-listings">Featured</a></li>
    @endpush
    <section id="index-slider-listings" class="main-section slider-listings">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($featured_listings as $featured_listing)
                                <div class="swiper-slide ratio ratio16_9 ">
                                    <span class="swiper-lazy-preloader"></span>
                                    <img class="content swiper-lazy" data-src="{{ cropped_photo($featured_listing->photo, 1280,720) }}">
                                    <div class="hide" itemscope itemtype="http://schema.org/SingleFamilyResidence">
                                        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                            <meta itemprop="streetAddress" content="{{ $featured_listing->address or '' }}">
                                            <meta itemprop="addressLocality" content="{{ $featured_listing->city or '' }}">
                                            <meta itemprop="addressRegion" content="{{ $featured_listing->state or '' }}">
                                            <meta itemprop="addressCountry" content="{{ $featured_listing->country or 'United States' }}">
                                            <meta itemprop="postalCode" content="{{ $featured_listing->zip or '' }}">
                                        </div>
                                        <div itemprop="geo" itemscope="" itemtype="http://schema.org/GeoCoordinates">
                                            <meta itemprop="latitude" content="{{ $featured_listing->latitude or '' }}">
                                            <meta itemprop="longitude" content="{{ $featured_listing->longitude or '' }}">
                                        </div>
                                    </div>
                                    <div class="content-box featured-content-overlay bottom">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <ul class="list-unstyled">
                                                    <li class="title">{{ $featured_listing->title }}</li>
                                                    <li class="details">
                                                        <ul class="list-inline">
                                                            <li class="status">{{ $featured_listing->status }}</li>
                                                            <li class="price">{{ $featured_listing->price_formatted }}</li>
                                                            @if (isset($featured_listing->bedrooms))
                                                                <li class="beds">
                                                                    <span>{{ $featured_listing->bedrooms }}</span> Beds
                                                                </li>
                                                            @endif
                                                            @if (isset($featured_listing->full_baths))
                                                                <li class="full-baths">
                                                                    <span>{{ $featured_listing->full_baths }}</span> Full Baths
                                                                </li>
                                                            @endif
                                                            @if (isset($featured_listing->half_baths) && $featured_listing->half_baths != 0)
                                                                <li class="half-baths">
                                                                    <span>{{ $featured_listing->half_baths }}</span> Half Baths
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </li>
                                                    <li class="cta-btn m-t-10">
                                                        <a href="{{ $featured_listing->url }}" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i> View {{$listing_type}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($section->title) or isset($section->sub_title))
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="section-heading">{{ $section->title or '' }}<br>
                            <small>{{ $section->sub_title or '' }}</small>
                        </h1>
                    </div>
                </div>
            </div>
        @endif
    </section>
    {{-- Scripts --}}
    @push('scripts')
    <script type='text/javascript'>
        indexSliderListings('#index-slider-listings .swiper-container');
    </script>
    @endpush
    @php($listing_well_class = 'main-section')
@else
    @php($listing_well_class = 'full-page-search')
@endif
@if(!isset($section->hide_search))
    @include('index.sections.search-listings', ['listing_well_class' => $listing_well_class ])
@endif
