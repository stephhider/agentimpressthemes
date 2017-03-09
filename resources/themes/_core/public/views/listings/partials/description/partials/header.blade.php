{{-- {{ dump($listing) }} --}}
<ul class="list-inline listing-specs">
    <li class="status {{ str_slug($listing->status) }} label label-primary">{{ $listing->status }}</li>
    @if($listing->price)
    <li class="price label label-success">{{ $listing->price_formatted }} </li>
    @endif
    @if($listing->price and $listing->sqft)
    <li class="price-sqft label label-info">{{ $listing->price_sqft }} Per sqft </li>
    @endif
    @if($listing->show_dom_message)
    <li class="dom label label-info"><span>{{ $listing->dom_message }}</span></li>
    @endif
    @if($listing->mls)
    <li class="mls label label-info"><span>MLS# <span>{{ $listing->mls }}</span></span></li>
    @endif
</ul>
<h1 class="section-heading">{{ $title or '' }} <br>
    <small>{{ $sub_title or '' }}</small>
</h1>
<ul class="list-inline listing-points">
    {!! $listing->bedrooms ? '<li>' . $listing->bedrooms.' Bed </li>' : '' !!}
    {!! $listing->full_baths ? '<li>' . $listing->full_baths.' Full Bath </li>' : '' !!}
    {!! $listing->half_baths ? '<li>' . $listing->half_baths.' Half Bath </li>' : '' !!}
    {!! $listing->sqft ? '<li>' . $listing->sqft_formatted.' sqft  </li>' : '' !!}
</ul>
