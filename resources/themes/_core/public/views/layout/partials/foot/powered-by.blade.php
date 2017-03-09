<div class="powered-by">
    <a target="_blank" href="https://www.agentimpress.me/">
        <img class="power-by-ai-logo light" src="{{ cdn_asset('assets/admin/img/power-by-ai-logo.png') }}" data-src="{{ cdn_asset('assets/admin/img/power-by-ai-logo.png') }}" data-src-retina="{{ cdn_asset('assets/admin/img/power-by-ai-logo@2x.png')}}" width="150" height="54" alt="agentimpress.me">
        <img class="power-by-ai-logo dark" src="{{ cdn_asset('assets/admin/img/power-by-ai-logo-dark.png') }}" data-src="{{ cdn_asset('assets/admin/img/power-by-ai-logo-dark.png') }}" data-src-retina="{{ cdn_asset('assets/admin/img/power-by-ai-logo-dark@2x.png')}}" width="150" height="54" alt="agentimpress.me">
    </a>
    @if(isset($config->navigations->powered_by))
        @foreach($config->navigations->powered_by as $title => $link)
            <small><a href="{{ $link->href }}" target="_blank">{{ $title }}</a></small>
        @endforeach
    @endif
</div>
