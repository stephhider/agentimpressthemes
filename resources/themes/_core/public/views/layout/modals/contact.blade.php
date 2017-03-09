<div class="modal fade left" id="listing-contact" tabindex="-1" role="dialog" aria-labelledby="listing-contact-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="listing-contact-label">Contact {{ $user->name }}</h4>
            </div>
            <div class="modal-body">
                @include('layout.partials.forms.contact')
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        @if (isset($config->contact->address_block))
                            {!! $config->contact->address_block !!}
                        @else
                            @if (isset($company))
                                <address>
                                    <strong>Office Address</strong><br>
                                    <a target="_blank" href="https://www.google.com/maps/place/{{ urlencode(strtolower($company->address . ' ' . $company->city . ' ' . $company->state . ' ' . $company->zip)) }}">
                                        {{ $company->address }}<br>
                                        {{ $company->city }}, {{ $company->state }} {{ $company->zip }}<br>
                                    </a>
                                </address>
                                <hr>
                            @endif
                        @endif
                        @if (isset($config->contact->phone_block))
                            {!! $config->contact->phone_block !!}
                        @else
                            <address>
                                @if(isset($user->mobile))
                                    <strong title="Mobile">Mobile:</strong> {{ $user->mobile_formatted }}<br>
                                @endif
                                @if(isset($company) && $company->office)
                                    <strong title="Phone">Phone:</strong> {{ $company->office_formatted }}<br>
                                @endif
                                @if(isset($company) && $company->fax)
                                    <strong title="Fax">Fax:</strong> {{ $company->fax_formatted }}<br>
                                @endif
                                @if(isset($user->email))
                                    <strong title="Email">Email:</strong>
                                    <a href="mailto:{{  $user->email }}">{{  $user->email }}</a><br>
                                @endif
                            </address>
                            <hr>
                        @endif
                        <ul style="font-size: 30px;" class="list-inline social">
                            @if($user->facebook)
                                <li>
                                    <a href="{{ $user->facebook }}" target="_blank"><i class="fa fa-facebook-square"></i></a>
                                </li>
                            @endif
                            @if($user->twitter)
                                <li>
                                    <a href="{{ $user->twitter }}" target="_blank"><i class="fa fa-twitter-square"></i></a>
                                </li>
                            @endif
                            @if($user->linkedin)
                                <li>
                                    <a href="{{ $user->linkedin }}" target="_blank"><i class="fa fa-linkedin-square"></i></a>
                                </li>
                            @endif
                            @if($user->youtube)
                                <li>
                                    <a href="{{ $user->youtube }}" target="_blank"><i class="fa fa-youtube-square"></i></a>
                                </li>
                            @endif
                            @if($user->instagram)
                                <li>
                                    <a href="{{ $user->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                            @endif
                            @if($user->googleplus)
                                <li>
                                    <a href="{{  $user->googleplus }}" target="_blank"><i class="fa fa-google-plus-square"></i></a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>