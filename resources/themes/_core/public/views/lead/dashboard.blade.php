@extends('layout.master')
@section('content')
    <section class="customer-info main-section">
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#viewed" aria-controls="notes" role="tab" data-toggle="tab">
                                <i class="fa fa-clock-o"></i> <span class="link-label">Viewed</span></a>
                        </li>
                        <li role="presentation">
                            <a href="#recommended" aria-controls="notes" role="tab" data-toggle="tab">
                                <i class="fa fa-check-circle-o"></i> <span class="link-label">Recommended</span>
                                @if ($recommended->count())
                                   <span class="badge pull-right">{{ $recommended->count() }}</span>
                                @endif
                            </a>
                        </li>
                        <li role="presentation"><a href="#favorites" aria-controls="notes" role="tab" data-toggle="tab">
                                <i class="fa fa-star-o"></i> <span class="link-label">Favorites </span>
                                @if ($favorites->count() > 0)
                                    <span class="badge pull-right">{{ $favorites->count() }}</span>
                                @endif
                            </a>
                        </li>

                        <li role="presentation" class="pull-right">
                            <a href="{{ route('social.logout') }}">
                                <i class="fa fa-sign-out"></i> <span class="link-label">Sign Out </span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="viewed">
                            @include('lead.partials.listings', ['listings' => $viewed, 'agent' => $agent, 'title' => 'Recently Viewed Listings'])
                        </div>
                        <div role="tabpanel" class="tab-pane" id="recommended">
                            @include('lead.partials.listings', ['listings' => $recommended, 'agent' => $agent, 'title' => 'Recommended Listings', 'showRecommended' => true])
                        </div>
                        <div role="tabpanel" class="tab-pane" id="favorites">
                            @include('lead.partials.listings', ['listings' => $favorites, 'agent' => $agent, 'title' => 'Favorite Listings'])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script src="{{ cdn_asset('assets/public/js/index.js') }}"></script>
@endpush