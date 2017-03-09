@if ((auth()->check() && auth()->id() === (int) $user->id) || (auth()->check() && auth()->user()->hasRole('admin')))
<section class="admin-bar">
    <div class="container">
        <a class="admin-dash" href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
        @if($page_type === 'listing')
            <a class="admin-listing admin-action" href="{{ route('admin.listing.details', $listing->id) }}"><i class="fa fa-home" aria-hidden="true"></i> Edit {{ $listing_type }}</a>
        @endif
        @if($page_type === 'static' && isset($page->id))
            <a class="admin-listing admin-action" href="{{ route('admin.website.pages.show', $page->id) }}"><i class="fa fa-home" aria-hidden="true"></i> Edit Page</a>
        @endif
        <span class="pull-right">
            <a class="admin-logout" href="{{ route('logout') }}"><i class="fa fa-power-off" aria-hidden="true"></i> Log Out</a>
        </span>
    </div>
</section>
@endif
