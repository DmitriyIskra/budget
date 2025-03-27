<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('links-js-css.links-js-css')
        <title>Budget</title>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body>
        <h1>Hello Frend</h1>
        <div class="welcome__wrapper">

            <div class="welcome__window-login">
                <div class="welcome__wr-title">
                    <h2>Войдите или зарегистрируйтесь</h2>
                </div>
                <x-welcome.welcome />
            </div>
        </div>
    </body>
</html>
