<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-includes.metatags />
    <title>{{ config('app.name', 'Jardim De Momentos') }}</title>
    <x-includes.styles />
</head>

<body>
    {{ $slot }}
    <x-includes.scripts />
</body>

</html>
