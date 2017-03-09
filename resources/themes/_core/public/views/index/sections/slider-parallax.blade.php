@php($slides = collect($config->sections->index->slider_parallax->slides))
@php($bg_image = $config->sections->index->slider_parallax->img)
@if(isset($slides))
<section id="parallax-content" class="swiper-container ratio ratio16_9 window-max-height" data-autoplay="{{ $section->speed or 'false' }}">
    <div class="parallax-bg wow fadeIn" style="width: 1{{ count($slides) }}0%; background-image: url('{{ isset($bg_image) ? cropped_photo(cdn_asset($bg_image), 2000) : '' }}')" data-swiper-parallax="-{{ count($slides) - 1 }}0%"></div>
    <div class="swiper-wrapper content wow fadeIn">
        @foreach ($slides as $key => $slide)
            <div class="swiper-slide">
                @if(isset($slide->title) or isset($slide->paragraph))
                <div class="slider-content featured-content-overlay bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                @if(isset($slide->title))
                                <h2 class="section-heading" data-swiper-parallax="-500"> {{ $slide->title or '' }} <br> <small>{{ $slide->sub_title or '' }} </small> </h2>
                                @endif
                                @if(isset($slide->paragraph))
                                <div class="section-content" data-swiper-parallax="-1000">{{ $slide->paragraph or '' }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        @endforeach
    </div>
    @if (count($slides) > 1 )
    {{-- Add Pagination --}}
    @if (isset($section->pagination))
        <div class="swiper-pagination swiper-pagination-white"></div>
    @endif
    {{-- Add Navigation --}}
    @if (isset($section->nav))
    <div class="swiper-button-prev swiper-button-white"></div>
    <div class="swiper-button-next swiper-button-white"></div>
    @endif
    {{-- Scripts --}}
    @push('scripts')
    <script type='text/javascript'>
        indexSliderParallax('#parallax-content');
    </script>
    @endpush
    @endif
</section>
@endif
