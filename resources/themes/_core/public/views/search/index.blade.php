@extends('layout.master')

@section('content')
    <section id="main-search-page-section" class="main-section">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-heading">
                        Search Local {{ str_plural($listing_type) }}
                        <br>
                        <small>Search by city, zip or neighborhood!</small>
                    </h2>
                </div>
                <div class="col-sm-12">
                @include('search.components.search-form', ['show_results' => true])
                <span class="clearfix"></span>
                </div>
                <div class="col-sm-12">
                    @include('search.components.search-info')
                </div>
            </div>
        </div>
    </section>
    <section id="main-search-search-results" class="main-section search-results-section">
        @include('search.components.search-results')
    </section>
@endsection

@push('scripts')
<script src="{{ cdn_asset('assets/public/js/listing/search.js') }}"></script>
@endpush
