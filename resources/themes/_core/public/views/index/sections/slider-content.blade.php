@php($slides = collect($config->sections->index->slider_content->slides))
@if(isset($slides))
<section id="slider-content" class="swiper-container" data-autoplay="{{ $section->speed or '5000' }}" data-effect="{{ $section->effect or 'slide'}}">
   <div class="swiper-wrapper content wow fadeIn">
       @foreach ($slides as $key => $slide)
            <div class="swiper-slide ratio ratio16_9 window-max-height">
                <div class="content" style="background-image: url('{{ isset($slide->img) ? cropped_photo(cdn_asset($slide->img), 2000) : '' }}')" >
                    @if(isset($slide->title) or isset($slide->paragraph))
                    <div class="slider-content featured-content-overlay bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    @if(isset($slide->title))
                                    <h2 class="section-heading"> {{ $slide->title or '' }} <br> <small>{{ $slide->sub_title or '' }} </small> </h2>
                                    @endif
                                    @if(isset($slide->paragraph))
                                    <div class="section-content">{{ $slide->paragraph or '' }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
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
       indexSliderContent('#slider-content');
   </script>
   @endpush
   @endif
</section>
@endif
