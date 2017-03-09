@if(!$listings->isEmpty())
    {{-- Nav Link --}}
    @push('main-menu')
    <li><a class="page-scroll" href="#index-featured-listings">{{ str_plural($listing_type) }}</a></li>
    @endpush

    <section id="index-featured-listings" class="main-section">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-heading">
                        {{ $section->title or 'My ' . str_plural($listing_type) }}
                        <br>
                        <small>{{ $section->sub_title or 'Here Are Some Of My ' . str_plural($listing_type) }}</small>
                    </h2>
                </div>
            </div>
            <div class="row">
                <listing-wells initial-listings="{{ $listings }}" authorized="{{ $authorized }}" inline-template>
                    @include('listings.partials.well')
                </listing-wells>
            </div>
        </div>
    </section>
@endif
