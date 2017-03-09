<section class="main-section static-content">
  <div class="container wow fadeIn">
    <div class="row">
      <div class="col-sm-12">
        @include('static.partials.section-heading')
        {!! yaml_html($section->content) !!}
      </div>
    </div>
  </div>
</section>
