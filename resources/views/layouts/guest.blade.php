<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-includes.metatags />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <x-includes.styles />
    <x-includes.scripts />
</head>

<body id="body-pd antialised">
    <section class="vh-100" id="auth">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    {{ $slot }}
                </div>
            </div>
        </div>
        @include('auth.layout.footer')
    </section>
</body>

</html>
