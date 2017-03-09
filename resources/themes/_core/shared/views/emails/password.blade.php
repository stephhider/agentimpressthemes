<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <meta charset="utf-8">
</head>

<body>

<h3><a href="{{ url('password/reset/'.$token) }}">Reset your password.</a></h3>
<p>To reset you password, please click the link below</p>

{{ url('password/reset/'.$token) }}

</body>
</html>
