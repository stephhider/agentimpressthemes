{{-- Nav Link --}}
@push('main-menu')
<li><a class="page-scroll" href="#index-search-listings">Search</a></li>
@endpush

<section id="index-search-listings" class="{{ $listing_well_class or 'main-section' }}">
    @if (isset($listing_well_class) && $listing_well_class == 'full-page-search')
        <div class="ratio ratio16_9 window-max-height wow fadeIn">
            <div class="content img-bg-cover" style="background-image: url('{{ isset($slide->img) ? cropped_photo(cdn_asset($slide->img), 2000) : cropped_photo(cdn_asset('assets/clients/000/img/forsale.png'), 2000) }}')">
                <div class="search-form-bg-section featured-content-overlay">
                    <div class="container search-form-wrapper">
                        <h2 class="section-heading">
                            {{ $section->title or 'Find Your Dream Home.' }}
                            <br>
                            <small>{{ $section->sub_title or 'Search by City.' }}</small>
                        </h2>
                        @include('search.forms.basic-search-form')
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-heading">
                        {{ $section->title or 'Find Your Dream Home.' }}
                        <br>
                        <small>{{ $section->sub_title or 'Search by City.' }}</small>
                    </h2>
                    @include('search.components.search-form')
                </div>
            </div>
        </div>
    @endif
</section>
