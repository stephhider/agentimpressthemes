<div class="row">
    @if ($listings->count() > 0)
        <listing-wells initial-listings="{{ $listings }}" inline-template>
            @include('listings.partials.well')
        </listing-wells>
    @else
        <p class="text-muted">No <i>Listings</i> were found for this section.</p>
    @endif
</div>
