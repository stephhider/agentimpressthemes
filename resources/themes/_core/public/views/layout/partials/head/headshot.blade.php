@if(isset($config->settings->headshot))
    {!! $config->settings->headshot !!}
@else
@if (isset($user->photo))
<li class="navbar-head-shot"><a href="/"><img data-nopin="nopin" class="user-headshot-img animated fadeIn" src="{{ cropped_photo($user->photo_url, 100,100) }}" alt="{{ $user->full_name or '' }}"></a></li>
@endif
@endif