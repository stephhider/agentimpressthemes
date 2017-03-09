<ul class="list-inline row">
    @foreach ($area_links as $area_link)
        <li class="col-sm-4"><a href="{{ url('search?location=' . trim($area_link)) }}">{{ $area_link or "City Name" }} Homes For Sale</a></li>
    @endforeach
</ul>