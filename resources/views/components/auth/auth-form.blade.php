<div class="auth-form__wr-form">
    @if ($form === 'login')
        <form class="auth-form__form" action="/login" method="POST" name="login-form">
            @csrf
            <div class="auth-form__wr-input">
                <input class="auth-form__input" type="email" name="email" placeholder="Почта" required>
            </div>
            <div class="auth-form__wr-input auth-form__wr-input-pass">
                <label>
                    <input class="auth-form__input" type="password" name="password" placeholder="Пароль" required>
                    <span class="auth-form__show-pass"></span>
                </label>
            </div>
            <div class="auth-form__wr-input">
                <input type="submit">
            </div>
        </form>
        <div class="auth-form__wr-recover auth-form__wr-input-pass">
            <label>
                <a class="auth-form__link" href="/form-auth/recover">Восстановить пароль.</a>
            </label>
        </div>
        <div class="auth-form__wr-remember">
            <label class="auth-form__remember-me-label">
                <input class="auth-form__remember-me-box" type="checkbox">
                <span class="auth-form__remember-me-text">Запомнить меня</span>
            </label>
        </div>
    @elseif($form === 'register')
        <form class="auth-form__form" action="/register" method="POST" name="register-form" enctype="multipart/form-data">
            @csrf
            <div class="auth-form__wr-input">
                <input class="auth-form__input" type="text" name="name" placeholder="Ваше имя">
            </div>
            <div class="auth-form__wr-input">
                <input class="auth-form__input" type="text" name="patronymic" placeholder="Ваше отчество">
            </div>
            <div class="auth-form__wr-input">
                <input class="auth-form__input" type="email" name="email" placeholder="Ваша почта" required>
            </div>
            <div class="auth-form__wr-input">
                <input class="auth-form__input" type="tel" name="phone" placeholder="Телефон">
            </div>
            <div class="auth-form__wr-input">
                <input class="auth-form__input" type="text" name="login" placeholder="Логин">
            </div>
            <div class="auth-form__wr-input auth-form__wr-input-pass">
                <label>
                    <input class="auth-form__input" type="password" name="password" placeholder="Пароль" required>
                    <span class="auth-form__show-pass"></span>
                </label>
            </div>
            <div class="auth-form__wr-input">
                <label class="auth-form__label-file">
                    Выберите файл
                    <input type="file" name="avatar">
                </label>
            </div>
            <div class="auth-form__wr-input">
                <input type="submit">
            </div>
        </form>
    @elseif($form === 'recover')
        <form class="auth-form__form" action="">
            @csrf
            <div class="auth-form__wr-input">
                <input class="auth-form__input" type="email" name="email" placeholder="Почта" required>
            </div>
            <div class="auth-form__wr-input">
                <input type="submit">
            </div>
        </form>
    @elseif($form === 'new-pass')
        <form class="auth-form__form" action="">
            <div class="auth-form__wr-input auth-form__wr-input-pass">
                <label>
                    <input class="auth-form__input" type="password" name="password" placeholder="Пароль" required>
                    <span class="auth-form__show-pass"></span>
                </label>
            </div>
            <div class="auth-form__wr-input auth-form__wr-input-pass">
                <label>
                    <input class="auth-form__input" type="password" name="password" placeholder="Пароль" required>
                    <span class="auth-form__show-pass"></span>
                </label>
            </div>
            <div class="auth-form__wr-input">
                <input type="submit">
            </div>
        </form>
    @endif
</div>
