@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/register.css') }}">
@endsection

@section('content')
<div class="register-form">
    <div class="form-title">
        <h2>登録画面</h2>
    </div>
    <form action="/register" method="post">
        @csrf
        <div class="form-group">
            <label class="form-label" for="" >ユーザー名</label>
            <input class="form-input" type="text" name="name" value="{{ old('name') }}">
            @error('name')
            <span class="form-error">{{$errors->first('name')}}</span>
            @enderror
        </div>
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
            <label class="form-label" for="" >確認用パスワード</label>
            <input class="form-input" type="password" name="password_confirmation" value="">
            @error('password')
            <span class="form-error">{{$errors->first('password')}}</span>
            @enderror
        </div>
        <div class="form-group">
            <button class="form-button" type="submit">登録する</button>
            <p class="form-link"><a href="/login">ログインはこちら</a></p>
        </div>
    </form>
</div>
@endsection