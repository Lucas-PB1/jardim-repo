<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-cms.includes.metatags />
    <x-cms.includes.styles />
    <x-cms.includes.scripts />
</head>

<body id="body-pd antialised">
    <div class="wrapper">
        <x-cms.menu.sidebar-menu />

        <div id="content">
            @include('layouts.cms.header')
            {{ $slot }}
        </div>
    </div>
</body>

</html>
