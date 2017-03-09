@extends('layout.master')
@section('content')
<section class="customer-info main-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('lead.partials.listings', ['listings' => $favorites, 'agent' => $agent, 'title' => 'Favorite Listings'])
            </div>
        </div>
    </div>
</section>
@endsection
{{-- {{ dump(get_defined_vars()['__data']) }} --}}
@push('scripts')
<script src="{{ cdn_asset('assets/public/js/index.js') }}"></script>
@endpush
