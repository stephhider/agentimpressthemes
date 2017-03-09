<div class="agent-well members well">
    <div class="row">
        <div class="col-sm-12 member-picture">
            @if(isset($agent->profile))
                @php($avatar = $agent->profile)
            @else
                @php($avatar = 'assets/admin/img/blank-avatar.jpg')
            @endif
            <a href="{{ url('agents/' . $agent->slug) }}">
                <img style="width:100%;" class="img-responsive img-rounded" src="{{ cropped_photo(cdn_asset($avatar), 400, 400)}}" alt="{{ $agent->first_name or 'Agent' }}"/>
            </a>
            <div class="">
                <a href="{{ url('agents/' . $agent->slug) }}" class="btn btn-primary btn-lg btn-block m-t-10 m-b-10">View {{ properize($agent->first_name) }} {{ str_plural($listing_type) }}</a>
            </div>
        </div>
        <div class="col-sm-12">
            <h3 class="m-t-0">
                <a href="{{ url('agents/' . $agent->slug) }}"><strong>{{ $agent->first_name }} {{ $agent->last_name }}</strong>

                    @if(isset($agent->title))
                        <br><small>{{ $agent->title or ''}}</small>
                    @endif
                </a>
            </h3>
            @if(isset($agent->email))
                <div class="member-email">
                    <strong data-toggle="tooltip" data-placement="left" title="Email">E: </strong><a href="mailto:{{ $agent->email or ''}}">{{ $agent->email or ''}}</a>
                </div>
            @endif
            <small>
            @if(isset($agent->office_phone) || isset($agent->fax) || isset($agent->mobile))

                <ul class="member-numbers list-unstyled">
                    @if(isset($agent->office_phone))
                        <li>
                            <strong data-toggle="tooltip" data-placement="left" title="Office Phone">O: </strong> {{ $agent->office_phone }}
                            @if(isset($agent->office_ext))
                                ext. {{ $agent->office_ext }}
                            @endif
                        </li>
                    @endif
                    @if(isset($agent->mobile))
                        <li><strong <strong data-toggle="tooltip" data-placement="left" title="Mobile Phone">M: </strong> {{ $agent->mobile }}
                        </li>
                    @endif
                    @if(isset($agent->fax))
                        <li><strong data-toggle="tooltip" data-placement="left" title="Fax Number">F: </strong> {{ $agent->fax }}</li>
                    @endif
                </ul>
            @endif
            @if(isset($agent->links))
                <ul class="member-links list-inline">
                    @foreach ($agent->links as $key => $link)
                        <li><a href="{{ $link->url }}" target="_blank"> {{$link->name}}</a> </li>
                    @endforeach
                </ul>
            @endif
            </small>

        </div>
    </div>
    <div class="clearfix"></div>
</div>
