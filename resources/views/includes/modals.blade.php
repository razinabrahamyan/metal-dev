<input type="hidden" value="{{$errors->login}}" id="login_errors">
<input type="hidden" value="{{$errors}}" id="match_error">
<input type="hidden" value="{{$errors->register}}" id="register_errors">
<input type="hidden" value="{{session()->get('should_login')}}" id="should_login">

<div class="modal" id="login_modal">
    <div class="login-from">
        <h3>Войти</h3>
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group ">
                <input type="text" class="{{$errors->login->has('email') || $errors->has('match') ? 'is-invalid' : ''}}"  name="email" placeholder="email" @if($errors->login->any() || $errors)
                value="{{old('email')}}" @endif required >

                @if($errors->login->has('email'))
                    <div class="invalid-feedback_handler">
                        {{ $errors->login->first('email') }}
                    </div>
                @endif
                @error('match')
                <div class="invalid-feedback_handler">
                    {{ $message }}
                </div>

                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Пароль" required="">
            </div>
<!--            <div class="form-group">
                <div class="checkbox-wrap">
                    <input type='checkbox' name='remember-me' value='remember-me' id="remember-me" />
                    <label for="remember-me">Remember Me</label>
                </div>
                <a href="#" class="forgot-pass">Forgot Password?</a>
            </div>-->
            <div class="form-group">
                <button type="submit" class="theme-btn btn-style-one">Войти</button>
            </div>
        </form>

<!--        <div class="form-group">
            <span class="text">Or connect with</span>
        </div>
        <div class="form-group">
            <a href="#" class="social-btn facebook-btn"><span class="fab fa-facebook-f"></span> Facebook</a>
            <a href="#" class="social-btn google-btn"><span class="fab fa-google"></span> Google</a>
        </div>-->
        <div class="form-group bottom-text">
            <div class="text">Не зарегистрированы?</div>
            <a role="button" class="signup-link" id="reg_from_login_modal">Создать аккаунт</a>
        </div>
    </div>
</div>
<div class="modal" id="register_modal">
    <div id="login-modal">
        <div class="login-from register">
            <h3>Регистрация</h3>
            <form action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Имя" name="first_name">
                    <input type="text" placeholder="Фамилия" name="last_name">
                </div>
                <div class="form-group">

                    <input type="email" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Пароль" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Подтвердите Пароль" required="">
                </div>
<!--                <div class="form-group full-width">
                    <div class="checkbox-wrap">
                        <input type='checkbox' name='remember-me' value='remember-me' id="agree-policy" />
                        <label for="agree-policy">I agree to the <a href="#">Privacy Policy</a></label>
                    </div>
                    <div class="checkbox-wrap">
                        <input type='checkbox' name='remember-me' value='remember-me' id="agree-terms" />
                        <label for="agree-terms">I agree to the <a href="#">Terms and Conditions</a></label>
                    </div>
                </div>-->
                <div class="form-group">
                    <button type="submit" class="theme-btn btn-style-one">Зарегистрироваться</button>
                </div>
            </form>

<!--            <div class="form-group">
                <span class="text">Or connect with</span>
            </div>
            <div class="form-group">
                <a href="#" class="social-btn facebook-btn"><span class="fab fa-facebook-f"></span> Facebook</a>
                <a href="#" class="social-btn google-btn"><span class="fab fa-google"></span> Google</a>
            </div>-->
            <div class="form-group bottom-text">
                <div class="text">Есть аккаунт?</div>
                <a role="button" class="signup-link" id="log_from_register_modal">Войти</a>
            </div>
        </div>
    </div>
</div>



