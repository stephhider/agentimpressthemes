{{-- {{ dd(get_defined_vars()['__data']) }} --}}
@extends('layout.master')
@section('content')
    @if(isset($page->sections))
        @foreach($page->sections as $key => $section)
            @php($view = 'static.sections.' . str_slug($key))
            @if(view()->exists($view))
                @include($view, ['section' => $section ])
            @endif
        @endforeach
    @endif
@endsection
@push('scripts')
<script src="{{ cdn_asset('assets/public/js/static.js') }}"></script>
@endpush

{{-- Modals --}}
@push('modals')
@include('layout.modals.contact')
@endpush