{{-- {{ dd(get_defined_vars()['__data']) }} --}}
@extends('layout.master')
@section('content')

    <section class="main-section static-about">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    @include('static.partials.section-heading')
                    <div class="bio-content">
                        <div class="dynamic-bio-content">
                            <img data-nopin="nopin" class="img-rounded img-responsive pull-left m-r-10 m-b-10" src="{{ cropped_photo(cdn_asset($agent->profile), 300, 'resize') }}" alt="{{ $agent->first_name or '' }}">
                            <h3 class="m-t-0">
                                <a href="{{ url('agents/' . $agent->slug) }}">{{ $agent->first_name }} {{ $agent->last_name }}</a>
                            </h3>
                            @if(isset($agent->email))
                                <div class="member-email">
                                    <strong>Email: </strong><a href="mailto:{{ $agent->email or ''}}">{{ $agent->email or ''}}</a>
                                </div>
                            @endif
                            @if(isset($agent->office_phone) || isset($agent->fax) || isset($agent->mobile))
                                <ul class="member-numbers list-unstyled">
                                    @if(isset($agent->office_phone))
                                        <li>
                                            <strong>Office: </strong> {{ $agent->office_phone }}
                                            @if(isset($agent->office_ext))
                                                ext. {{ $agent->office_ext }}
                                            @endif
                                        </li>
                                    @endif
                                    @if(isset($agent->mobile))
                                        <li><strong>Mobile: </strong> {{ $agent->mobile }}
                                        </li>
                                    @endif
                                    @if(isset($agent->fax))
                                        <li><strong>Fax: </strong> {{ $agent->fax }}</li>
                                    @endif
                                </ul>
                            @endif
                            
                            <span class="clearfix"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(isset($agent->mls_id))
        @if(isset($listings) && !$listings->isEmpty())
            @include('static.sections.listings')
        @else
            <section id="index-featured-listings" class="main-section">
                <div class="container wow fadeIn">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-info">
                                {{ $agent->first_name }} {{ $agent->last_name }} doesn't have any listings to view at the moment, please check back!
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif

@endsection
@push('scripts')
<script src="{{ cdn_asset('assets/public/js/static.js') }}"></script>
@endpush

{{-- Modals --}}
@push('modals')
@include('layout.modals.contact')
@endpush
