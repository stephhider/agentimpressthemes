<li class="dropdown lead-items">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span>{{ $lead->name or 'Settings' }}</span>
        <i class="fa fa-caret-down"></i>
    </a>

    <ul class="dropdown-menu dropdown-menu-right">
        <li>
            <a href="{{ route('lead.saved') }}">
                @if (isset($favorites) && $favorites->count() > 0)
                    <span class="badge favorites-badge">{{ $favorites->count() }}</span>
                @endif
                Saved {{ str_plural($listing_type) }}
            </a>
        </li>
        <li>
            <a href="{{ route('lead.viewed') }}">
                @if (isset($viewed) && $viewed->count() > 0)
                    <span class="badge viewed-badge">{{ $viewed->count() }}</span>
                @endif
                Viewed {{ str_plural($listing_type) }}
            </a>
        </li>
        <li role="separator" class="divider"></li>
        <li>
            <a href="{{ route('social.logout') }}">
                <span class="link-label">Sign Out </span><i class="fa fa-sign-out"></i>
            </a>
        </li>
    </ul>
</li>
