<div id="listing-details-description-features" class="sub-subsection">
	<h4 class="subsection-heading">{{ $listing_type or 'Listing' }} Features</h4>
	<ul class="row list-unstyled listing-features">
		@foreach ($listing->custom_fields as $key => $val)
		<li class="col-sm-4"><strong>{{ $key }}:</strong> <span>{{ $val }}</span></li>
		@endforeach
	</ul>
</div>
