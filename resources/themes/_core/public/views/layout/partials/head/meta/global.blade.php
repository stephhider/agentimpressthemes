<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, user-scalable=no" />
<meta name="_token" content="{{ csrf_token() }}">
<meta name="keywords" content="{{ $meta['keywords'] or '' }}">
<meta name="description" content="{{ $meta['description'] or '' }}">
<meta name="robots" content="index, follow">
<meta name="author" content="{{ $user->full_name or '' }} {{ $user->email or '' }}">
{{-- START Twitter Card data --}}
<meta name="twitter:card" content="{{ $meta['image'] or '' }}">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="{{ $meta['title'] or '' }}">
<meta name="twitter:description" content="{{ $meta['description'] or '' }}">
<meta name="twitter:creator" content="@author_handle">
<meta name="twitter:image:src" content="{{ $meta['image'] or '' }}">
{{-- END Twitter Card data --}}
{{-- START Graph data --}}
<meta property="og:title" content="{{ $meta['description'] or '' }}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ $meta['image'] or '' }}" />
<meta property="og:description" content="{{ $meta['description'] or '' }}" />
<meta property="og:site_name" content="{{ $user->full_name }} - {{ $user->company->name or $user->title }}" />
<meta property="fb:admins" content="" />
{{-- END Graph data --}}
@stack('meta')