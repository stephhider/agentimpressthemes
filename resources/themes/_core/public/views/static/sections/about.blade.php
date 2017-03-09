<section class="main-section static-about">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-sm-12">
                @include('static.partials.section-heading')
                <div class="bio-content">
                    @if(isset($section->content))
                        {!! yaml_html($section->content) !!}
                    @else
                        <div class="dynamic-bio-content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <img data-nopin="nopin" class="img-rounded img-responsive pull-left m-r-10 m-b-10" src="{{ cropped_photo($user->photo_url, 300, 'resize') }}" alt="{{ $user->full_name or '' }}">
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    {!! $user->bio !!}
                                </div>
                            </div>
                            <span class="clearfix"></span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
