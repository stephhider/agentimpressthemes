<section class="main-section static-testimonials">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-sm-12">
              @include('static.partials.section-heading')
              @foreach ($config->testimonials as $key => $testimonial)
                @include('static.partials.testimonial')
              @endforeach
            </div>
        </div>
    </div>
</section>
