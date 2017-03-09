@if(isset($section->title) or isset($section->sub_title))
  <h3 class="section-heading">{{ $section->title or '' }}<br><small>{{ $section->sub_title or '' }}</small></h3>
@endif
