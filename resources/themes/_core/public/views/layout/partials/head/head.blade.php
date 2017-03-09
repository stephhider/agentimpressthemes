<head>
    @if (app()->environment() == 'production')
        @include('rollbar.browser-js')
    @endif
    <script async src="{{ cdn_asset('assets/shared/js/modernizer.min.js', true) }}" type="text/javascript"></script>
    <title>{{ $meta['title'] or '' }}</title>
    {{-- http://realfavicongenerator.net/ --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ cdn_asset('assets/public/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ cdn_asset('assets/public/img/favicons/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ cdn_asset('assets/public/img/favicons/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ cdn_asset('assets/public/img/favicons/manifest.json') }}">
    <link rel="mask-icon" href="{{ cdn_asset('assets/public/img/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    @include('layout.partials.head.meta')
    @include('layout.partials.head.styles')

    {{-- Zopim Instant Chat --}}
    @if (isset($plugins['zopim']))
        {!! $plugins['zopim'] !!}
    @endif

    {{-- Google Analytics --}}
    @if (isset($plugins['google-analytics']))
        {!! $plugins['google-analytics'] !!}
    @endif

    {{-- Facebook Pixel --}}
    @if (isset($plugins['facebook-pixel']))
        {!! $plugins['facebook-pixel'] !!}
    @endif
</head>
