@extends('user.register')

@section('content')
<!-- Login Admin -->
<form method="POST" action="{{ URL::to('/register') }}">
    @csrf
    <div class="login-form">
        <!-- logo-login -->
        <div class="logo-login">
            <a href="/"><img src="{{ asset('/user/img/logo/loder.png') }}" alt=""></a>
        </div>
        <h2>ここで登録</h2>
        <div class="form-input">
            <label for="name" class="col-form-label text-md-right">名前</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-input">
            <label for="email" class="col-form-label text-md-right">メール</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-input">
            <label for="phone" class="col-form-label text-md-right">電話番号</label>
            <input id="phone" type="phone" name="phone"/>
        </div>

        <div class="form-input">
            <label for="email" class="col-form-label text-md-right">アバター</label>
            <input type="file" name="avatar_url">
        </div>

        <div class="form-input">
            <label for="password" class="col-form-label text-md-right">パスワード</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-input">
            <label for="password-confirm" class="col-form-label text-md-right">パスワード確認</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
        </div>

        <div class="form-input pt-30">
            <input type="submit" name="submit" value="登録">
        </div>
        <!-- Forget Password -->
        <a href="{{ URL::to('/login') }}" class="registration">ログイン</a>
    </div>
</form>
<!-- /end login form -->
@endsection
