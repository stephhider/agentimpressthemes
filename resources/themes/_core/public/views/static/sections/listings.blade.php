<section id="index-featured-listings" class="main-section">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-sm-12">
                @include('static.partials.section-heading')
            </div>
        </div>
        <div class="row">
            <listing-wells initial-listings="{{ $listings }}" inline-template>
                @include('listings.partials.well')
            </listing-wells>
        </div>
    </div>
</section>
