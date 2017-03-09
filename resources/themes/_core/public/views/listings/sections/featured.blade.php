<section id="listing-featured" class="featured-section">
    <div class="wow fadeIn">
        <div id="listing-featured-swiper" class="swiper-container">
            @if(count($featured) == 1)
                @php($item = $featured->first())
                @if ($item instanceof App\Models\Embed)
                    <div class="{{ $item->type }} ratio ratio16_9 window-max-height">
                    @if($item->vendor === 'vimeo')
                        <div id="vimeo-background" class="content lazy-wrap">
                            <iframe class="content vimeo-video" src="//player.vimeo.com/video/{{ $item->embed_id }}?portrait=0&amp;color=333" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            			</div>
                    @elseif ($item->vendor === 'youtube')
                        <div id="youtube-background" class="content lazy-wrap">
                            <div id="youtube-bg" class="player lazy-content" data-property="{videoURL:'https://youtu.be/{{ $item->embed_id }}',containment:'#youtube-background',autoPlay:true, mute:true, startAt:0, opacity:1,showControls:false, loop:true, quality: 'large'}"></div>
            			</div>
                        @push('scripts')
                        <script type='text/javascript'>
                        $("#youtube-bg").YTPlayer();
                        </script>
                        @endpush
                    @elseif ($item->vendor === 'matterport')
                        <div id="matterport-background" class="content lazy-wrap">
                            {{-- SEE https://support.matterport.com/hc/en-us/articles/209980967-URL-Parameters /// &title=0&play=1&qs=1 --}}
                            <iframe class="content matterport-tour" src="https://my.matterport.com/show/?m={{ $item->embed_id }}&amp;title=0&amp;brand=0&amp;play=1&amp;qs=1&amp;wh=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            			</div>
                    @else
                        <iframe class="content swiper-lazy" src="{{ $item->src }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    @endif
                    </div>
                @elseif ($item instanceof App\Models\ListingPhoto)
                    <div class="image ratio ratio16_9 window-max-height">
                        <div id="image-background" class="lazy-wrap content">
                            <img class="lazy-content" src="{{ cropped_photo($item->src, 2000, 1125  ) }}" />
                        </div>
                    </div>
                @endif
            @else
            <div class="swiper-wrapper listing-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                @foreach ($featured as $index => $item)
                    @if ($item instanceof App\Models\Embed)
                    <figure class="swiper-slide video ratio ratio16_9 window-max-height">
                        <span class="swiper-lazy-preloader"></span>
                        @if($item->vendor === 'vimeo')
                            <iframe class="content swiper-lazy" src="//player.vimeo.com/video/{{ $item->embed_id }}?portrait=0&amp;color=333" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            @elseif ($item->vendor === 'youtube')
                            <iframe class="content swiper-lazy" src="{{ $item->src }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            @elseif ($item->vendor === 'matterport')
                            <iframe class="content swiper-lazy" src="https://my.matterport.com/show/?m={{ $item->embed_id }}&amp;title=0&amp;play=1&amp;qs=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            @else
                            <iframe class="content swiper-lazy" src="{{ $item->src }}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        @endif
                    </figure>
                    @elseif ($item instanceof App\Models\ListingPhoto)
                    <figure class="swiper-slide image ratio ratio16_9 window-max-height">
                        <span class="swiper-lazy-preloader"></span>
                        <img class="content swiper-lazy" src="" data-src="{{ cropped_photo($item->src, 2000, 1125 ) }}" />
                    </figure>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
                @push('scripts')
                <script type='text/javascript'>
                    listingFeatured('#listing-featured-swiper');
                </script>
                @endpush
            @endif
        </div>
    </div>
    <div class="next-section-arrow">
        <div class="animated-arrow">
            <a class="page-scroll" href="#next-section-arrow"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
        </div>
    </div>
    <div id="next-section-arrow"></div>
</section>