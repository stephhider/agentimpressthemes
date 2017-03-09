<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
@if(isset($config->settings->styles->font))
  <link href="{{ $config->settings->styles->font }}" rel="stylesheet"/>
@else
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
@endif
@if(isset($config->settings->styles->vendor))
  <link href="{{ cdn_asset($config->settings->styles->vendor, true) }}" rel="stylesheet"/>
@else
  <link href="{{ cdn_asset('assets/public/css/themes/'. $theme .'/vendor.min.css', true) }}" rel="stylesheet"/>
@endif
@if(isset($config->settings->styles->default))
  <link href="{{ cdn_asset($config->settings->styles->default, true) }}" rel="stylesheet"/>
@else
  <link href="{{ cdn_asset('assets/public/css/themes/'. $theme .'/'. $skin .'.css', true) }}" rel="stylesheet"/>
@endif
@if(isset($config->settings->styles->custom))
  @foreach ($config->settings->styles->custom as $key => $style)
    <link href="{{ cdn_asset($style, true) }}" rel="stylesheet"/>
  @endforeach
@endif
@stack('styles')
