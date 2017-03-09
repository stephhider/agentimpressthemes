@if(isset($config->navigations->footer))
    <div id="menu-footer" class="footer-section">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    @include('layout.partials.nav.footer')
                </div>
            </div>
        </div>
    </div>
@endif

@includeIf('layout.partials.foot.custom')

<div id="main-footer" class="footer-section">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-3">
                @include('layout.partials.contact-block')
            </div>
            @if ($area_links)
                <div class="col-md-9">
                    @include('layout.partials.foot.area-links')
                </div>
            @endif
        </div>
    </div>
</div>

<div id="power-by-footer" class="footer-section">
    <div class="container wow fadeIn">
        @if ($user->has_idx && ($page_type == 'index' || $page_type == 'mls' || $page_type == 'search'))
        <div class="row disclaimer-content">
            <div class="col-sm-12">
                @include('disclaimers.disclaimer')
                @if ($franchise = $user->franchise)
                    @include('franchises.disclaimer')
                @endif
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                @include('layout.partials.foot.powered-by')
            </div>
        </div>
    </div>
</div>
