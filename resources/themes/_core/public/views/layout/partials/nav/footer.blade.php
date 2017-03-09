<div class="row">
@foreach($config->navigations->footer as $item => $menu)
<ul class="list-unstyled {{ $menu->class or 'col-sm-3' }}">
<li><h4>{{ $menu->title }}</h4></li>
@if(isset($menu->items))
    @foreach($menu->items as $link => $item)
        @include('layout.partials.nav.items.footer.custom')
    @endforeach
@endif
</ul>
@endforeach
</div>
