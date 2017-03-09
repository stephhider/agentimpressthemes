{{-- Nav Link --}}
@push('main-menu')
<li><a class="page-scroll" href="#listing-thumbnails">Photos</a></li>
@endpush
<section id="listing-thumbnails" class="main-section">
    <div class="wow fadeIn">
        <div class="container">
            <div id="listing-swiper" class="swiper-container">
                <div class="swiper-wrapper listing-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                    {{--Embeds--}}
                    @foreach ($embeds as $index => $embed)
                        @php($count = $index + 1)
                        <figure class="swiper-slide video ratio thumb {{ str_slug($embed->vendor) }}" data-type="{{ title_case($embed->type) }}" data-vendor="{{ title_case($embed->vendor) }}">
                            <span class="swiper-lazy-preloader"></span>
                            <span class="iframe-span"></span>
                            <iframe class="content tour-iframe-slide" src="{{ $embed->src }}"></iframe>
                            <a class="img-action btn-gallery {{ str_slug($embed->type) }}" href="{{ $embed->src }}" data-featherlight="iframe"><i class="fa fa-expand" aria-hidden="true"></i></a>
                            <span class="img-action tour-type">{{ title_case($embed->vendor) }} {{ title_case($embed->type) }}</span>
                            <span class="img-action count"> Video {{ $count or '' }} of {{ count($embeds) }}</span>
                            <span class="swiper-lazy-preloader"></span>
                            <a class="visible-xs-inline-block visible-sm-inline-block" style="position: absolute; z-index: 100; top: 0; right: 0; left: 0; bottom: 0;" target="_blank" href="{{ $embed->src }}" ></a>
                        </figure>
                    @endforeach
                    {{--Photos--}}
                    @foreach ($photos as $index => $photo)
                        @php($count = $index + 1)
                        <figure class="swiper-slide gallery ratio thumb lazy-wrap">
                            <span class="swiper-lazy-preloader lazy-preloader"></span>
                            <a class="img-action btn-pin window-pop" href="https://www.pinterest.com/pin/create/button/?url={{ url()->current() . '&amp;media=' . cropped_photo($photo->src) . '&amp;description=' . urlencode($photo->description) }}"><i class="fa fa-pinterest"></i> Pin It</a>
                            <a class="img-action btn-gallery image" itemprop="thumbnailUrl" href="{{ cropped_photo($photo->src) }}" data-featherlight="image"><i class="fa fa-expand" aria-hidden="true"></i></a>
                            <img class="content swiper-lazy" itemprop="image" data-src="{{ cropped_photo($photo->src, 600, 400) }}" alt="{{ $photo->description or 'Listing Image' }}">
                            <span class="img-action count"> Photo {{ $count or '' }} of {{ count($photos) }}</span>
                            <figcaption class="hide" itemprop="description">{{ $photo->description or '' }}</figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script type='text/javascript'>
    listingImages('#listing-swiper');
</script>
@endpush
