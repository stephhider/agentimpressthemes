@stack('layout-partials-nav-main-top')
<nav id="main-header" class="navbar navbar-default animated fadeIn">
    <div class="container">
        <div class="navbar-header ">
            @include('layout.partials.head.toggle')
            <ul class="list-inline logos-head-shots">
                @include('layout.partials.head.headshot')
                @include('layout.partials.head.logo')
            </ul>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if($menu_header)
                    @include('layout.partials.nav.items.main.menu')
                @else
                    @include(isset($config->navigations->main) ? 'layout.partials.nav.items.main.custom' : 'layout.partials.nav.items.main.default')
                @endif
                @if (auth()->guard('leads')->check())
                    @include('layout.partials.nav.lead-items')
                @endif
            </ul>
        </div>
    </div>
</nav>
