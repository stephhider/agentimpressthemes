@if(isset($mls_listings))
    {{-- Nav Link --}}
    @push('main-menu')
    <li><a class="page-scroll" href="#index-listings">Listings</a></li>
    @endpush

    <section id="index-listings" class="main-section wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @include('static.partials.section-heading')
                </div>
            </div>
            <div class="row">
                <listing-wells initial-listings="{{ $mls_listings }}" inline-template>
                    @include('listings.partials.well')
                </listing-wells>
            </div>
        </div>
    </section>

@endif