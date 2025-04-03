
<div class="modal income-add">
    <div class="dialog__close">X</div>
    <h3 class="modal__title">Добавить доход</h3>
    <form class="dialog__form change-summ__form" action="/income-add" method="POST" name="income-add-form">
        @csrf
        <div class="dialog__form__wr-inputs">
            <label class="dialog__label">
                <span class="dialog__label-title">Наименование</span>
                <input class="dialog__input-text income-add__name" type="text" name="name" required/>
            </label>
            <label class="dialog__label">
                <span class="dialog__label-title">Сумма (разделитель: точка)</span>
                <input class="dialog__input-text income-add__summ" type="text" name="summ" required/>
            </label>
        </div>
        <div class="dialog__wr-button">
            {{-- <input type="submit"> --}}
            <button class="dialog__button" type="submit">Сохранить</button>
        </div>
    </div>
</div>