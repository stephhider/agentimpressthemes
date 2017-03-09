@php($section = $config->sections->index->video_bg)
@if(isset($section))
<section id="index-video-bg">
    <div class="wow fadeIn ratio ratio16_9 window-max-height">
        <div class="lazy-wrap content">
            <div style="z-index: 10;" id="youtube-background" class="content">
                <div id="youtube-bg" class="player" data-property="{videoURL:'https://youtu.be/{{ $section->youtube_id or '' }}',containment:'#youtube-background',autoPlay:true, mute:true, startAt:0, opacity:1,showControls:false, loop:true, quality: 'large'}"></div>
            </div>
            <span style="z-index: 1;" class="lazy-preloader"></span>
            @if(isset($section->title) or isset($section->paragraph))
                <div style="z-index: 20;" class="slider-content featured-content-overlay bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                @if(isset($section->title))
                                <h2 class="section-heading"> {{ $section->title or '' }} <br> <small>{{ $section->sub_title or '' }} </small> </h2>
                                @endif
                                @if(isset($section->paragraph))
                                <div class="section-content">{{ $section->paragraph or '' }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@push('scripts')
<script type='text/javascript'>
$("#youtube-bg").YTPlayer();
</script>
@endpush
@endif
