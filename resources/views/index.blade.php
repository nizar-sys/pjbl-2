<x-guest-layout>
    <div class="login">
        <div class="login__left">
            <h2 class="login__h fs-1">Project Based Learning</h2>
            <p>
                Fringilla phasellus faucibus scelerisque eleifend donec
                pretium vulputate sapien nec.
            </p>
            <img class="login__left__img" src="/img/hero-login.png" alt="Login" />
        </div>
        <div class="login__right">
            <h1 class="login__h">Sign In</h1>
            <form action="{{ route('authenticate') }}" method="POST" class="login__form">
                @error('username')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                @csrf
                <div class="login__input mb-3">
                    <label class="login__input__label" for="username">
                        username
                    </label>
                    <input class="login__input__input" type="text" id="username" name="username" />
                </div>
                <div class="login__input">
                    <label class="login__input__label" for="password">password</label>
                    <input class="login__input__input" type="password" id="password" name="password" />
                </div>
                <a class="login__forgot mt-2" href="#">Forgot Password?</a>
                <button class="btn btn-lg rounded-pill btn-primary d-block w-100 mt-5" type="submit">
                    Sign In
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
