<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('links-js-css.links-js-css')
    <title>{{ $params === 'login' ? 'Вход' : 'Регистрация' }}</title>
</head>
<body>
    <div class="auth-forms__wrapper">
        <x-auth.auth-form form={{$params}} />
    </div>
</body>
</html>