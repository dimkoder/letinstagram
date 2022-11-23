<!DOCTYPE html>
<html lang="ru_RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<h1 style="text-align:center">{{ env('APP_NAME') }}</h1>
<ul>
    @forelse($query as $key=>$value)
        <li>{{ $key }} = {{ $value }}</li>
    @empty
        <p>No data in $query</p>
    @endforelse
</ul>
{!! $img_text !!}
</body>
</html>
