@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection

@section('content')

<div class="login-form">
    <div class="form-title">
        <h2>ログイン画面</h2>
    </div>
    <form action="/login" method="post">
        @csrf
        <div class="form-group">    
            <label class="form-label" for="" >メールアドレス</label>
            <input class="form-input" type="email" name="email" value="{{ old('email') }}">
            @error('email')
            <span class="form-error">{{$errors->first('email')}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="" >パスワード</label>
            <input class="form-input" type="password" name="password" value="">
            @error('password')
            <span class="form-error">{{$errors->first('password')}}</span>
            @enderror
        </div>
        <div class="form-group">
            <button class="form-button" type="submit">ログインする</button>
            <p class="form-link"><a href="/register">会員登録はこちら</a></p>
        </div>
    </form>
</div>
@endsection