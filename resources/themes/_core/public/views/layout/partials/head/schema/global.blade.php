{{-- START Organization markup --}} {{--
<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
    <div itemprop="streetAddress" content="{{ $itemprop->streetAddress or $user->company->address }}"></div>
    <div itemprop="addressLocality" content="{{ $itemprop->addressLocality or $user->company->city }}"></div>
    <div itemprop="addressRegion" content="{{ $itemprop->addressRegion or $user->company->state }}"></div>
    <div itemprop="addressCountry" content="{{ $itemprop->addressCountry or 'United States' }}"></div>
    <div itemprop="postalCode" content="{{ $itemprop->postalCode or $user->company->zip }}"></div>
</div> --}}
{{-- <div itemscope itemtype="http://schema.org/PostalAddress">
    <span itemprop="name">{{ $itemprop->streetAddress or $user->company->address }}</span>
    <span itemprop="addressLocality">{{ $itemprop->addressLocality or $user->company->city }}</span>
    <span itemprop="addressRegion">{{ $itemprop->addressRegion or $user->company->state }}</span>
    <span itemprop="postalCode">{{ $itemprop->postalCode or $user->company->zip }}"</span>
    <span itemprop="addressCountry">{{ $itemprop->postalCode or $user->company->zip }}</span>
</div> --}}
{{--
<div itemscope itemtype="http://schema.org/Organization">
    <meta itemprop="name" content="{{ $itemprop->name or $user->company->name }}">
    <meta itemprop="description" content="{{ $itemprop->description or $meta['description'] }}">
    <meta itemprop="telephone" content="{{ $itemprop->telephone or phone($user->mobile) }}">
    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <meta itemprop="streetAddress" content="{{ $itemprop->streetAddress or $user->company->address }}">
        <meta itemprop="addressLocality" content="{{ $itemprop->addressLocality or $user->company->city }}">
        <meta itemprop="addressRegion" content="{{ $itemprop->addressRegion or $user->company->state }}">
        <meta itemprop="addressCountry" content="{{ $itemprop->addressCountry or 'United States' }}">
        <meta itemprop="postalCode" content="{{ $itemprop->postalCode or $user->company->zip }}">
    </div>
    <meta itemprop="email" content="{{ $itemprop->email or $user->email }}">
    <meta itemprop="openingHours" content="{{ $itemprop->openingHours or '' }}" />
    <meta itemprop="url" content="{{ $itemprop->url or 'https://'.$user->subdomain.'.agentimpress.me' }}">
    <meta itemprop="image" content="{{ isset($itemprop->image) ? cropped_photo(cdn_asset($itemprop->image), 500, 500) : cropped_photo($user->photo_url, 500, 500) }}">
    <meta itemprop="startDate" content="{{ $itemprop->startDate or '' }}">
    <meta itemprop="endDate" content="{{ $itemprop->endDate or '' }}">
</div>
<div itemscope itemtype="http://schema.org/{{ $user_type == 'agent' ? 'RealEstateAgent' : 'LocalBusiness' }}">
    <meta itemprop="name" content="{{ $itemprop->name or $user->company->name }}">
    <meta itemprop="description" content="{{ $itemprop->description or $meta['description'] }}">
    <meta itemprop="telephone" content="{{ $itemprop->telephone or phone($user->mobile) }}">
    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <meta itemprop="streetAddress" content="{{ $itemprop->streetAddress or $user->company->address }}">
        <meta itemprop="addressLocality" content="{{ $itemprop->addressLocality or $user->company->city }}">
        <meta itemprop="addressRegion" content="{{ $itemprop->addressRegion or $user->company->state }}">
        <meta itemprop="addressCountry" content="{{ $itemprop->addressCountry or 'United States' }}">
        <meta itemprop="postalCode" content="{{ $itemprop->postalCode or $user->company->zip }}">
    </div>
    <meta itemprop="email" content="{{ $itemprop->email or $user->email }}">
    <meta itemprop="openingHours" content="{{ $itemprop->openingHours or '' }}" />
    <meta itemprop="url" content="{{ $itemprop->url or 'https://'.$user->subdomain.'.agentimpress.me' }}">
    <meta itemprop="image" content="{{ isset($itemprop->image) ? cropped_photo(cdn_asset($itemprop->image), 500, 500) : cropped_photo($user->photo_url, 500, 500) }}">
    <meta itemprop="startDate" content="{{ $itemprop->startDate or '' }}">
    <meta itemprop="endDate" content="{{ $itemprop->endDate or '' }}">
</div> --}}
