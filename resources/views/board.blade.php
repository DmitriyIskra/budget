<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('links-js-css.links-js-css')
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="header__data board__user-avatar"></div>
        <div class="board__user-full-name">
            <div class="header__data board__user-patronymic">{{$user->patronymic}}</div>
            <div class="header__data board__user-name">{{$user->name}}</div>
        </div>

        <div class="header__data board__date">{{ date('d.m.Y') }}</div>

        <div class="header__data board__balance"><span>Баланс:</span> 6454 руб.</div>

        <div class="header__data board__logout">
            <a class="board__logout-link" href="/logout" title="выход">
                <img src="{{ asset('images/exit.png') }}" alt="">
            </a>
        </div>
    </header>
</body>
</html>