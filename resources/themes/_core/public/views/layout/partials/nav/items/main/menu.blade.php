@foreach($menu_header as $item)
    @if(count($item['children']) > 0)
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $item['title'] }} <i class="fa fa-caret-down"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
               @include('layout.partials.nav.items.main.menu', ['menu_header' => $item['children']])
            </ul>
        </li>
    @else
        <li>
            <a class="{{ $item['attributes']['class'] }}" href="{{ $item['href'] }}">{{ $item['title'] }}</a>
        </li>
    @endif
@endforeach