@if(!$listing->events->isEmpty())
    <div id="events">
        <div class="container">
            <div class="content" data-toggle="modal" href='#openHouseModal'>
                <span class="op-info"><strong>{{ $listing->events->first()->title or 'Open House' }}</strong> : {{ $listing->events->first()->date }} from {{ $listing->events->first()->start_at->format('h:i A') }} to {{ $listing->events->first()->end_at->format('h:i A') }}</span>
                <a class="btn btn-primary btn-sm pull-right">Add To Calendar</a>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="modal fade top" id="openHouseModal" data-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        @foreach ($listing->events as $event)
                            <div class="event-item well">
                                <div class="event-title">
                                    {{ $event->title or 'Open House' }}
                                    <hr>
                                </div>
                                @if ($event->description)
                                    <div class="event-description">
                                        {{ $event->description }}
                                        <hr>
                                    </div>
                                @endif
                                <div class="event-time">
                                    <strong>Date: </strong> {{ $event->date }}
                                    <br><strong>Time: </strong> {{ $event->start_at->format('h:i A') }} - {{ $event->end_at->format('h:i A') }}
                                </div>
                                <div class="addtocalendar atc-style-blue">
                                    <var class="atc_event">
                                        <var class="atc_date_start">{{ $event->start_at }}</var>
                                        <var class="atc_date_end">{{ $event->end_at }}</var>
                                        <var class="atc_timezone">{{ $listing->timezone or 'UTC' }}</var>
                                        <var class="atc_title">{{ $event->title }}</var>
                                        <var class="atc_description">{{ $event->description }}</var>
                                        <var class="atc_location">{{ $listing->location }}</var>
                                        <var class="atc_organizer">{{ $user->name }}</var>
                                        <var class="atc_organizer_email">{{ $user->email }}</var>
                                    </var>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif