@extends('layout.master')

{{-- Content --}}
@section('content')
    @if(isset($config->sections->index))
        @foreach($config->sections->index as $key => $section)
            @if(view()->exists('index.sections.' . str_slug($key)))
                @include('index.sections.' . str_slug($key), ['section' => $section ])
            @endif
        @endforeach
    @else
        @include('index.sections.slider-listings')
        @include('index.sections.agent-bio')
        @include('index.sections.featured-listings')
    @endif
@endsection

{{-- Scripts --}}
@push('scripts')
<script src="{{ cdn_asset('assets/public/js/index.js') }}"></script>
@endpush
