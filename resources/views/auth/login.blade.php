@extends('user.login')

@section('content')

    <!-- Login Admin -->
    <form class="form-default" method="POST" action="{{ URL::to('/login') }}">
        @csrf
        <div class="login-form">
            <!-- logo-login -->
            <div class="logo-login">
                <a href="/"><img src="{{ asset('/user/img/logo/loder.png') }}" alt=""></a>
            </div>
            <h2>ここでログイン</h2>
            <div class="form-input">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="メールを入力" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-input">
                <label for="password">パスワード</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="パスワードを入力" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="login">
            </div>
            <!-- Forget Password -->
            {{-- <a href="#" class="forget">パスワード忘れ</a> --}}
            <!-- Forget Password -->
            <a href="{{ URL::to('/register') }}" class="registration">登録</a>
        </div>
    </form>
    <!-- /end login form -->
@endsection
