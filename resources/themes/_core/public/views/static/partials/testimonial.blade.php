<blockquote>
  @if(isset($testimonial->title))
  <strong>{{ $testimonial->title or '' }}</strong>
  @endif
  <p>{{ $testimonial->comment or '' }}</p>
  <footer>{{ $testimonial->name or '' }} <span class="date">{{ $testimonial->date or '' }}</span></footer>
  @if(isset($testimonial->link))
    <a class="btn btn-primary m-t-10" href="{{ $testimonial->link }}">View {{ $listing_type }}</a>
  @endif
</blockquote>
