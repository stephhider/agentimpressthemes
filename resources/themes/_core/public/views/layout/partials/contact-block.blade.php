<div itemscope itemtype="http://schema.org/{{ $user_type == 'agent' ? 'RealEstateAgent' : 'LocalBusiness' }}">
    <address>
        <span itemprop="name"><strong>{{ $itemprop->name or $user->company->name }}</strong></span>
        @if(isset($user->franchise))
            <br>
            <span>{{ $user->franchise->name }}</span>
        @endif
        <small>
            <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                @if(isset($user->company->address))
                    <span itemprop="streetAddress">{{ $itemprop->streetAddress or $user->company->address }}</span><br>
                @endif
                @if(isset($user->company->city))
                    <span itemprop="addressLocality">{{ $itemprop->addressLocality or $user->company->city }}</span>
                @endif
                @if(isset($user->company->state))
                    <span itemprop="addressRegion">{{ $itemprop->addressRegion or $user->company->state }}</span>
                @endif
                @if(isset($user->company->zip))
                    <span itemprop="postalCode">{{ $itemprop->postalCode or $user->company->zip }}</span>
                @endif
                @if (isset($itemprop->addressCountry))
                    <span itemprop="addressCountry">{{ $itemprop->addressCountry }}</span>
                @endif
            </div>
        </small>
        <ul class="list-unstyled contact-options">
            @if (isset($itemprop->telephone) || $user->company->office_formatted)
                <li>
                    <small>
                        <strong>P:</strong>
                        <span itemprop="telephone"> {{ $itemprop->telephone or $user->company->office_formatted }}</span>
                    </small>
                </li>
            @endif
            @if (isset($itemprop->faxNumber) || $user->company->fax_formatted)
                <li>
                    <small>
                    <strong>F:</strong>
                    <span itemprop="faxNumber"> {{ $itemprop->faxNumber or $user->company->fax_formatted }}</span>
                    </small>
                </li>
            @endif
            <li>
                <small>
                <strong>E:</strong>
                <a href="mailto:{{ $itemprop->email or $user->email }}">
                    <span itemprop="email">{{ $itemprop->email or $user->email }}</span>
                </a>
                </small>
            </li>
        </ul>
        <div class="m-b-10" itemscope itemtype="http://schema.org/Organization">
            <link itemprop="url" href="{{ $itemprop->url or 'https://'.$user->subdomain.'.agentimpress.me' }}">
            <ul class="social-media list-inline">
                @if(isset($user->facebook) && !empty($user->facebook))
                    <li>
                        <a target="_blank" itemprop="sameAs" href="{{ $user->facebook }}"><i class="fa fa-facebook-square"></i></a>
                    </li>
                @endif
                @if(isset($user->twitter) && !empty($user->twitter))
                    <li>
                        <a target="_blank" itemprop="sameAs" href="{{ $user->twitter }}"><i class="fa fa-twitter-square"></i></a>
                    </li>
                @endif
                @if(isset($user->linkedin) && !empty($user->linkedin))
                    <li>
                        <a target="_blank" itemprop="sameAs" href="{{ $user->linkedin }}"><i class="fa fa-linkedin-square"></i></a>
                    </li>
                @endif
                @if(isset($user->youtube) && !empty($user->youtube))
                    <li>
                        <a target="_blank" itemprop="sameAs" href="{{ $user->youtube }}"><i class="fa fa-youtube-square"></i></a>
                    </li>
                @endif
                @if(isset($user->instagram) && !empty($user->instagram))
                    <li>
                        <a target="_blank" itemprop="sameAs" href="{{ $user->instagram }}"><i class="fa fa-instagram"></i></a>
                    </li>
                @endif
                @if(isset($user->googleplus) && !empty($user->googleplus))
                    <li>
                        <a target="_blank" itemprop="sameAs" href="{{ $user->googleplus }}"><i class="fa fa-google-plus-square"></i></a>
                    </li>
                @endif
                @if(isset($user->pinterest) && !empty($user->pinterest))
                    <li>
                        <a target="_blank" itemprop="sameAs" href="{{ $user->pinterest }}"><i class="fa fa-pinterest-square"></i></a>
                    </li>
                @endif

            </ul>
        </div>
    </address>
</div>
