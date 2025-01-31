@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/address.css') }}">
@endsection

@section('content')

<div class="address-form">
    <div class="form-title">
        <h2>住所変更</h2>
    </div>
    <form action="#" method="post">
        @csrf
        <div class="form-group">
            <label for="" class="form-label">郵便番号</label>
            <input class="form-input" type="text" name="postcode">
            @error('')
            <p class="form-error"></p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">住所</label>
            <input class="form-input" type="text" name="address">
            @error('')
            <p class="form-error"></p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">建物名</label>
            <input class="form-input" type="text" name="building">
            @error('')
            <p class="form-error"></p>
            @enderror
        </div>
        <div class="from-group">
            <button class="form-button" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection