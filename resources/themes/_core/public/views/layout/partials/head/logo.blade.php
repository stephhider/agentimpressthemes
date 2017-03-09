@if (isset($user->company->photo) or isset($config->settings->logo))
    @if (isset($config->settings->logo))
        @php($logo = cdn_asset($config->settings->logo))
    @else
        @php($logo = $user->company->photo_url)
    @endif
    <li class="navbar-logo animated fadeIn"><a href="/"><img data-nopin="nopin" class="user-company-logo" src="{{ $logo }}" alt="{{ $user->company->name or '' }}"></a></li>
@else
<li class="company-name animated fadeIn"><a href="/">{{ $user->company->name or '' }}</a></li>
@endif
