<div class="social-share animated fadeIn">
    <ul class="list-group">
        <li class="list-group-item">
            <a class="window-pop facebook" data-toggle="tooltip" data-placement="right" title="Share it on Facebook" data-height="600" data-width="550" href="https://www.facebook.com/sharer.php?u={{ url()->current() }}"><i class="fa fa-facebook"></i></a>
        </li>
        <li class="list-group-item">
            <a class="window-pop google" data-toggle="tooltip" data-placement="right" title="Post it on Google +" data-height="600" data-width="550" href="https://plus.google.com/share?url={{ url()->current() }}"><i class="fa fa-google-plus"></i></a>
        </li>
        <li class="list-group-item">
            <a class="window-pop linkedin" data-toggle="tooltip" data-placement="right" title="Share it on LinkedIn" data-height="600" data-width="550" href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&amp;title={{ rawurlencode($listing->title) }}&amp;summary={{ rawurlencode(strip_tags($listing->description)) }}&amp;source={{ rawurlencode($user->full_name) }}"><i class="fa fa-linkedin"></i></a>
        </li>
        <li class="list-group-item">
            <a class="window-pop pocket" data-toggle="tooltip" data-placement="right" title="Save it on Pocket" data-height="600" data-width="550" href="https://getpocket.com/edit?url={{ url()->current() }}"><i class="fa fa-get-pocket" aria-hidden="true"></i></a>
        </li>
        <li class="list-group-item">
            <a class="window-pop twitter" data-toggle="tooltip" data-placement="right" title="Tweet it on Twitter" data-height="600" data-width="550" href="http://twitter.com/home?status=Check+out+this%20+{{ url()->current() }}"><i class="fa fa-twitter"></i></a>
        </li>
        <li class="list-group-item">
            <a class="window-pop pinterest" data-toggle="tooltip" data-placement="right" title="Pin it on Pinterest" data-height="600" data-width="550" href="http://pinterest.com/pin/create/link/?url={{ url()->current() }}"><i class="fa fa-pinterest"></i></a>
        </li>
    </ul>
</div>
