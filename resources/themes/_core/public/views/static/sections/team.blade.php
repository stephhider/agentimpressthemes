@foreach ($section as $key => $section)
<section class="main-section static-team {{ str_slug($section->type) }}">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-sm-12">
                @include('static.partials.team.default', ['section' => $section, 'team' => $config->team->{str_slug($section->type)} ])
            </div>
        </div>
    </div>
</section>
@endforeach
@push('scripts')
<script type="text/javascript">
    sameHeight('.staff-content', '.same-height-team');
    $(window).resize(function () {
        sameHeight('.staff-content', '.same-height-team');
    });
</script>
@endpush
