<div id="listing-details-description-text" class="sub-subsection">
	@if($listing->description)
		<h4 class="subsection-heading">{{ $listing_type or 'Listing' }} Description</h4>
		<div class="description">
		@if($page_type === 'listing')
			<p>{!! $listing->description or '' !!}</p>
		@else
			<p>{{ $listing->description or '' }}</p>
		@endif
		</div>
	@endif
	@if($listing->amenities_as_array)
	<div class="amenities">
		@php($amenities = $listing->amenities_as_array)
		<p>
		@foreach($amenities as $i => $amenity)
	        @if($amenity != array_last($amenities))
	            {{ $amenity }},
	        @else
	            {{ $amenity }}
	        @endif
	    @endforeach
		</p>
	</div>
	@endif
</div>
