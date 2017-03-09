<div id="listing-details-description-specs" class="sub-subsection">
	<div class="specs-stats">
		<div class="row">
			<div class="col-xs-6 col-md-12">
				<dl class="block">
<<<<<<< Updated upstream:agentimpress/resources/themes/_core/public/views/listings/partials/description/partials/~specs.blade.php
					<dd>11208 NW 103rd St. <br>Yukon, OK 73099</dd>
					<dd>For Sale</dd>
					<dd>Single-Family</dd>
					<dt>MLS#:</dt>
					<dd>123456</dd>
					<dt>Price:</dt>
					<dd>$230,000</dd>
=======
					<dt>Address:</dt>
					<dd>{{ $listing->address }} <br>{{ $listing->city }}, {{ $listing->state }} {{ $listing->zip }}</dd>
				</dl>
				<dl>
					<dt>Status:</dt>
					<dd>{{ $listing->status }}</dd>
				</dl>
				<dl>
					<dt>Type:</dt>
					<dd>{{ $listing->type }}</dd>
				</dl>
				<dl>
					<dt>MLS#:</dt>
					<dd>{{ $listing->mls }}</dd>
				</dl>
			</div>
			<div class="col-xs-6 col-md-12">
				<dl>
					<dt>Price:</dt>
					<dd>{{ $listing->price }}</dd>
				</dl>
				<dl>
>>>>>>> Stashed changes:agentimpress/resources/themes/_core/public/views/listings/partials/details/partials/description/partials/specs.blade.php
					<dt>Est Payment:</dt>
					<dd>$1,032/80</dd>
					<dt>Bedrooms:</dt>
<<<<<<< Updated upstream:agentimpress/resources/themes/_core/public/views/listings/partials/description/partials/~specs.blade.php
					<dd>Full: 3 Half: 2</dd>
					<dt>Baths:</dt>
					<dd>2</dd>
=======
					<dd>{{ $listing->beds }}</dd>
				</dl>
				<dl>
					<dt>Baths:</dt>
					<dd>{{ $listing->baths }}</dd>
				</dl>
				<dl class="last">
>>>>>>> Stashed changes:agentimpress/resources/themes/_core/public/views/listings/partials/details/partials/description/partials/specs.blade.php
					<dt>Half Baths:</dt>
					<dd>{{ $listing->half_baths }}</dd>
				</dl>
			</div>
		</div>
	</div>
</div>