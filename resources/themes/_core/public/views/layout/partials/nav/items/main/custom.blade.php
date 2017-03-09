@foreach($config->navigations->main as $link => $item)
    @if(isset($item->sub_menu))
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $link }} <i class="fa fa-caret-down"></i></a>
        <ul class="dropdown-menu dropdown-menu-right">
        @foreach($item->sub_menu as $link => $item)
            @if($link === 'divider')
            <li role="separator" class="divider"></li>
            @else
            <li><a class="{!! isset($item->class) ? $item->class : '' !!}" href="{!! isset($item->href) ? $item->href : '/'.str_slug($link) !!}">{!! isset($item->title) ? $item->title : $link !!}</a></li>
            @endif
        @endforeach
        </ul>
    </li>
    @else
    <li><a class="{!! isset($item->class) ? $item->class : '' !!}" href="{!! isset($item->href) ? $item->href : '/'.str_slug($link) !!}">{!! isset($item->title) ? $item->title : $link !!}</a></li>
    @endif
@endforeach