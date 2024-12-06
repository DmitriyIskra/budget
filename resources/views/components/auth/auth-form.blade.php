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
                <span class="form-error">@if($errors->has('name')) {{$errors->first('name')}} @endif</span>
                <input class="auth-form__input" type="text" name="name" value="{{ old('name') }}" placeholder="Ваше имя">
            </div>
            <div class="auth-form__wr-input">
                <span class="form-error">@if($errors->has('patronymic')) {{$errors->first('patronymic')}} @endif</span>
                <input class="auth-form__input" type="text" name="patronymic" value="{{ old('patronymic') }}" placeholder="Ваше отчество">
            </div>
            <div class="auth-form__wr-input">
                <span class="form-error">@if($errors->has('email')) {{$errors->first('email')}}@endif</span>
                <input class="auth-form__input" type="text" name="email" value="{{ old('email') }}" placeholder="Ваша почта">
            </div>
            <div class="auth-form__wr-input">
                <span class="form-error">@if ($errors->has('phone')) {{$errors->first('phone')}}@endif</span>
                <input class="auth-form__input" type="tel" name="phone" value="{{ old('phone') }}" placeholder="Телефон">
            </div>
            <div class="auth-form__wr-input auth-form__wr-input-pass">
                <label>
                    <span class="form-error">@if($errors->has('password')) @foreach ($errors->get('password') as $item)
                        {{$item}} <br>
                    @endforeach @endif</span>
                    <input class="auth-form__input" type="password" name="password" value="{{old('password')}}" placeholder="Пароль">
                    <span class="auth-form__show-pass"></span>
                </label>
            </div>
            <div class="auth-form__wr-input">
                <span  class="form-error">@if($errors->has('file')) {{$errors->first('file')}}@endif</span> <br>
                <label class="auth-form__label-file">
                    Выберите файл <br>
                    <input type="file" name="file">
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
