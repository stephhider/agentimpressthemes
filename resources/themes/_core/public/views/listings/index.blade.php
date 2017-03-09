@extends('layout.master')
@section('content')
    @include('listings.sections.events')
    @include('listings.partials.share.links')
    @if ($sections['featured'] and !Agent::isMobile())
        @include('listings.sections.featured')
    @endif
    @if ($sections['thumbnails'])
        @include('listings.sections.thumbnails')
    @endif
    @if ($sections['description'])
        @include('listings.sections.description')
    @endif
    @if ($sections['utility_scores'])
        @include('listings.sections.utility-scores')
    @endif
    @if ($sections['schools'])
        @include('listings.sections.schools')
    @endif
    @if ($sections['maps'])
        @include('listings.sections.maps')
    @endif
    @if ($sections['contact'])
        @include('listings.sections.contact')
    @endif
@endsection
@push('scripts')
<script type='text/javascript'>
    listingScripts();
</script>
@endpush
