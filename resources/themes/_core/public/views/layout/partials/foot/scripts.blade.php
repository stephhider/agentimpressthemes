@stack('modals')
@if($page_type != 'listing')
@include('layout.modals.contact')
@endif
@include('lead.modals.login')
@include('lead.modals.share')

<script async src="https://maps.googleapis.com/maps/api/js?key={{ Config::get('services.google.key') }}&libraries=places" type="text/javascript"></script>
@if(isset($config->settings->scripts->default))
    <script src="{{ cdn_asset($config->settings->scripts->default , true) }}" type="text/javascript"></script>
@else
    <script src="{{ cdn_asset('assets/public/js/themes/'. $theme .'/scripts.min.js', true) }}" type="text/javascript"></script>
@endif
@if(isset($config->settings->scripts->custom))
    @foreach ($config->settings->scripts->custom as $key => $script)
        <script src="{{ cdn_asset($script, true) }}" type="text/javascript"></script>
    @endforeach
@endif
@stack('scripts')
