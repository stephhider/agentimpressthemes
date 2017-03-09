@include('layout.partials.custom-stacks')
<!DOCTYPE html>
<html class="{{ app()->environment() }} {{ (auth()->check() && auth()->id() === (int) $user->id) ? 'logged_in' : 'logged_out' }}" lang="en">
@include('layout.partials.head.head')
<body class="{{ config('app.body-class') }}">
<div id="app">
{{-- bait for adblocker like addons. If they remove this div, we should disable rollbar error reporting --}}
<div id="blocker-bait" style="height: 1px; width: 1px; position: absolute; left: -999em; top: -999em" class="ads ad adsbox doubleclick ad-placement carbon-ads"></div>
@if (isset($config->settings->client_status))
    @include('layout.partials.client-status')
@else
@include('layout.partials.admin-bar')
    <header id="{{ $page_type }}-head" class="main-header top">
        @include('layout.partials.header')
    </header>
        @if (trim($__env->yieldContent('content')))
            @yield('content')
        @else
            @include('layout.partials.404-message')
        @endif
    <footer>
        @include('layout.partials.footer')
    </footer>
@endif
</div>
@include('layout.partials.foot.scripts')
</body>
</html>
