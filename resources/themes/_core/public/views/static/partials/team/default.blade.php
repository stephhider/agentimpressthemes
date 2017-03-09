<div class="row">
    <div class="col-sm-12">
        @include('static.partials.section-heading')
        <div class="staff-content">
            <div class="row">
                @foreach ($team as $key => $member)
                <div class="{{ $section->well_class or 'col-sm-12'}}">
                    <div class="members well ">
                        <div class="row same-height-team">
                            <div class="col-lg-4 member-picture">
                            @if(isset($member->picture))
                                @php($avatar = $member->picture)
                            @else
                                @php($avatar = 'assets/admin/img/blank-avatar.jpg')
                            @endif
                                <img style="width:100%;" class="img-responsive img-rounded" src="{{ cropped_photo(cdn_asset($avatar), 400, 400)}}" alt="{{ $member->name or 'Team Member' }}" />
                            </div>
                            <div class="col-lg-8">
                                @if(isset($member->name) or isset($member->title) or isset($member->company) or isset($member->email))
                                    <ul class="list-unstyled member-info">
                                        @if(isset($member->company))
                                            <li class="company"><h3>{{ $member->company or ''}} <small><strong>{{ $member->name or ''}}</strong></small><small><span>{{ $member->title or ''}}</span></small></h3></li>
                                        @else
                                            <li class="name"><h3>{{ $member->name or ''}} <small><strong>{{ $member->title or ''}}</strong></small></h3></li>
                                        @endif
                                    </ul> 
                                @endif
                                @if(isset($member->bio))
                                    <div>
                                        {!! $member->bio or '' !!}
                                    </div>
                                @endif
                                @if(isset($member->address))
                                    <div class="member-address m-b-10">
                                        <strong>Address:</strong><br>
                                        {{ $member->address->street or '' }}<br>
                                        {{ $member->address->city or '' }} {{ $member->address->state or '' }} {{ $member->address->zip or '' }}
                                    </div>
                                @endif
                                @if(isset($member->email))
                                    <div class="member-email"><strong>Email: </strong><a href="mailto:{{ $member->email or ''}}">{{ $member->email or ''}}</a></div>
                                @endif
                                @if(isset($member->numbers))
                                    <ul class="member-numbers list-unstyled">
                                        @foreach ($member->numbers as $key => $number)
                                            <li><strong>{{ $number->name or '' }}: </strong> {{ $number->number or '' }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                @if(isset($member->links))
                                    <ul class="member-links list-inline">
                                        @foreach ($member->links as $key => $link)
                                            <li><a href="{{ $link->url }}" target="_blank"> {{$link->name}}</a> </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
