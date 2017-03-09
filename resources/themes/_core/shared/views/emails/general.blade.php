<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

@foreach ($fields as $field)
    <div>{{ $field['name'] }}: {{ $field['value'] }}</div>
@endforeach

</body>
</html>