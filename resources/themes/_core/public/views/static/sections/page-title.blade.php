<section class="page-title-section wow fadeIn {{ isset($section->bg_img) ? 'bg-image' : 'main-section' }}" style="background-image: url('{{ isset($section->bg_img) ? cropped_photo(cdn_asset($section->bg_img), 2000, 400) : '' }}')">
    <div class="page-title-content">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12">
                    @if(isset($section->title))
                    <h1 class="section-heading">{{ $section->title }}
                        @if(isset($section->sub_title))
                        <br><small>{{ $section->sub_title }}</small>
                        @endif
                    </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
