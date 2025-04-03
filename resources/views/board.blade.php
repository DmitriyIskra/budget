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
    <div class="board">

        <header class="header">
            <div class="header__data board__user-avatar"></div>
            <div class="board__user-full-name">
                <div class="header__data board__user-patronymic">{{$user->patronymic}}</div>
                <div class="header__data board__user-name">{{$user->name}}</div>
            </div>
    
            <div class="header__data board__date">{{ date('d.m.Y') }}</div>
    
            <div class="header__data board__balance"><span>Баланс: </span><span>{{(float)$incomeMoneyTotal - 0}} руб.</span></div>
    
            <div class="header__data board__logout">
                <a class="board__logout-link" href="/logout" title="выход">
                    <img src="{{ asset('images/exit.png') }}" alt="">
                </a>
            </div>
        </header>
    
    
        <main>
            <ul class="tabs__list">
                <li class="tabs__item tabs__item_active"><p>Учет</p></li>
                <li class="tabs__item"><p>Статьи дохода</p></li>
                <li class="tabs__item"><p>Статьи расхода</p></li>
            </ul>
            <div class="wr-income-expenses">
                <div class="income">
                    <h4>Статьи дохода</h4>
                    <div class="income__wr-select">
                        <select class="income__select" name="" id="">
                            @foreach ($incomeMoney as $item)
                                <option value="{{$item['name']." ".$item['summ']}}" data-id="{{$item['id']}}">{{$item['name']." ".$item['summ']}}</option>
                            @endforeach
                        </select>
                        <div class="income__wr-select-buttons">
                            <button class="income__select-button income__select-add">+</button>
                            <button class="income__select-button income__select-del">-</button>
                        </div>
                        <div class="income__summ">
                            <span>{{$incomeMoneyTotal}}</span> р.</div>
                    </div>
                    <div class="income__wr-look-all">
                        <a class="income__look-all" href="#0" target="_blank" title="">Открыть все</a>
                    </div>
                    <div class="income__wr-contr-money">
                        <button class="income__money-button income__add-money">Изменить сумму</button>
                        <button class="income__money-button income__clear-money">Обнулить суммы</button>
                        {{-- сделать модалку где будет старый баланс ниже + или - чтоб не калькулировать в ручную и ниже новая сумма которую нужно прибавить или вычесть --}}
                    </div>
                </div>
                <div class="expenses">
                    <h4>Статьи расхода</h4>
                    <div class="expenses__wr-select">
                        <select class="expenses__select" name="" id=""></select>
                        <div class="expenses__wr-select-buttons">
                            <button class="expenses__select-button expenses__select-add">+</button>
                            <button class="expenses__select-button expenses__select-del">-</button>
                        </div>
                    </div>
                    <div class="expenses__wr-look-all">
                        <a class="expenses__look-all" href="#0" target="_blank" title="">Открыть все</a>
                    </div>
                </div>
            </div>
    
            <div class="record-keeping">  
                <div class="table">
                    <div class="table-header">
                        <div class="table-header__item table-header__name">Наименование</div>
                        <div class="table-header__item table-header__summ">Сумма</div>
                    </div>
                    <ul class="table__list">
                        {{-- <li class="table__item">
                            <div class="table__item-text table__name"> Какое то наименование</div>
                            <div class="table__item-text table__summ">250 р</div>
                        </li> --}}
                    </ul>
                </div>  
    
                <div class="table">
                    <div class="table-header">
                        <div class="table-header__item table-header__name">Наименование</div>
                        <div class="table-header__item table-header__summ">Сумма</div>
                    </div>
                    <ul class="table__list">
                        {{-- <li class="table__item">
                            <div class="table__item-text table__name"> Какое то наименование</div>
                            <div class="table__item-text table__summ">0 р</div>
                        </li> --}}
                    </ul>
                </div>
            </div>
            {{-- Добавление дохода --}}
        </main>
    </div>
    
    <dialog class="dialog">
        
        <x-modals.income-add-form />
        {{-- <h3 class="change-summ__title">Изменить сумму</h3>
        <form class="dialog__form change-summ__form" method="POST" action="">
            @csrf
            <div class="dialog__form__wr-inputs">
                <label class="dialog__label">
                    <span class="dialog__label-title">Введите сумму (разделитель: точка)</span>
                    <input class="dialog__input-text change-summ__old" type="text" required/>
                </label>
            </div>
            <div class="dialog__wr-button">
                <button class="dialog__button" type="submit">Сохранить</button>
            </div>
        </div> --}}
    </dialog>

    

</body>
</html>