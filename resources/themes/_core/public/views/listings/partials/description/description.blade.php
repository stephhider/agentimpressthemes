<section id="listing-description">
    <div class="row">
        <div class="col-sm-12">
            @include('listings.partials.description.partials.header')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('listings.partials.description.partials.description')
        </div>
    </div>
    @if($listing->features)
    <div class="row">
        <div class="col-sm-12">
            @include('listings.partials.description.partials.features')
        </div>
    </div>
    @endif
    @if (isset($listing->disclaimer))
    <div class="row">
        <div class="col-sm-12">
            @include('listings.partials.description.partials.mls-disclaimer')
        </div>
    </div>
    @endif
</section>
