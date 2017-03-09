{{-- {{ dd(get_defined_vars()['__data']) }} --}}
@extends('layout.master')
@section('content')
    <section class="main-section agents">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            @include('static.partials.section-heading')
                            <div class="staff-content">
                                <div class="row">
                                    @foreach ($agents as $agent)
                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            @include('agents.partials.agent-well')
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script src="{{ cdn_asset('assets/public/js/static.js') }}"></script>
<script type="text/javascript">

    $(window).resize(function () {
        sameHeight('.staff-content', '.agent-well.well');
    });
    $(document).ready(function() {
        sameHeight('.staff-content', '.agent-well.well');
    });
    setTimeout(
        function() {
          sameHeight('.staff-content', '.agent-well.well');
      }, 250);

</script>
@endpush

{{-- Modals --}}
@push('modals')
@include('layout.modals.contact')
@endpush
