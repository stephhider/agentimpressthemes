@extends('layout.master')
@section('content')
<section class="page-title-section wow fadeIn {{ isset($page->photo) ? 'bg-image' : 'main-section' }}" style="background-image: url('{{ isset($page->photo) ? cropped_photo(cdn_asset($page->photo), 2000, 400) : '' }}')">
    <div class="page-title-content">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12">
                    @if(isset($page->title))
                        <h1 class="section-heading">{{ $page->title }}
                            @if(isset($page->subtitle))
                                <br>
                                <small>{{ $page->subtitle }}</small>
                            @endif
                        </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main-section static-content">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-sm-12 static-content">
                {!! $page->body !!}
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="{{ cdn_asset('assets/public/js/static.js') }}"></script>
@endpush
