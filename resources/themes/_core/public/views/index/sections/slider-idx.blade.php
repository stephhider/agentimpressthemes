@php($slides = collect($config->sections->index->slider_idx->slides))

@if(isset($slides))
    <section id="slider-idx">
        <div id="slider-idx-swiper" class="swiper-container" data-autoplay="{{ $section->speed or '5000' }}" data-effect="{{ $section->effect or 'fade'}}">
            <div class="swiper-wrapper content wow fadeIn">
                @foreach ($slides as $key => $slide)
                    <div class="swiper-slide ratio ratio16_9 window-max-height">
                        <div class="content img-bg-cover" style="background-image: url('{{ isset($slide->img) ? cropped_photo(cdn_asset($slide->img), 2000) : '' }}')"></div>
                    </div>
                @endforeach
            </div>
            @if (count($slides) > 1 )
                {{-- Scripts --}}
                @push('scripts')
                <script type='text/javascript'>
                    indexSliderIdx('#slider-idx-swiper');
                </script>
                @endpush
            @endif
        </div>
        <div class="search-form-bg-section featured-content-overlay middle">
            <div class="search-form-wrapper">
                @if(isset($section->title))
                    <h1 class="section-heading"> {{ $section->title or '' }} <br>
                        <small>{{ $section->sub_title or '' }} </small>
                    </h1>
                @endif
                @include('search.forms.basic-search-form')
            </div>
        </div>
    </section>
@endif
