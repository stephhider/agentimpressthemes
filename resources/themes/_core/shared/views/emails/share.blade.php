<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<p>A listing has been shared with you:</p>

<h4>{{ $listing->address }}, {{ $listing->city }}, {{ $listing->state }} {{ $listing->zip }}</h4>
<a href="{{ $share_url }}">View Listing</a>
<div>
</div>
</body>
</html>