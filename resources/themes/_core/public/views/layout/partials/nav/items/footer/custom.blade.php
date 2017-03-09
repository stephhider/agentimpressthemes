<li {!! isset($item->li_class) ? 'class="'.$item->li_class.'"' : '' !!} >
    <{!! isset($item->type) ? $item->type : 'a' !!}
        {!! isset($item->class) ? 'class="'.$item->class.'"' : '' !!}
        @if (!isset($item->type))
            href="{!! isset($item->href) ? $item->href : '/'.str_slug($link) !!}"
        @endif
    >
    {!! isset($item->title) ? $item->title : $link !!}
    </{!! isset($item->type) ? $item->type : 'a' !!}>
</li>
