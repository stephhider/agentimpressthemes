{{-- START Product markup --}}
{{-- <div itemtype="http://schema.org/Product" itemscope="" class="zsg-hide">
<meta itemprop="name" content="{{ $listing->address or '' }}, {{ $listing->city or '' }}, {{ $listing->state or '' }} {{ $listing->zip or '' }}">
<meta itemprop="image" content="{{ $meta['image'] or '' }}" >
<meta itemprop="description" content="{{ $meta['description'] or '' }}">
<meta itemprop="category" content="Real Estate">
<div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="USD">
<meta itemprop="price" content="{{ $listing->price or '' }}">
</div>
</div> --}}
{{-- START Product markup --}}
{{-- START SingleFamilyResidence markup --}}

{{-- End SingleFamilyResidence markup --}}
<meta property="article:published_time" content="{{ $listing->created_at or '' }}" />
<meta property="article:modified_time" content="{{ $listing->updated_at or '' }}" />
<meta property="article:section" content="{{ $user->full_name or '' }}" />
<meta property="article:tag" content="{{ $meta['keywords'] or '' }}" />