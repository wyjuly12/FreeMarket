@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/myprofile.css') }}">
@endsection

@section('content')

<div class="myprofile-form">
    <div class="form-title">
        <h2>プロフィール設定</h2>
    </div>
    <form action="/" method="post">
        @csrf
        <div class="form-image" enctype="multipart/form-data">
            <output class="form-image__out" id="file-output" >
                <img src="{{ asset('/image/$profile->photo') }}" alt="プロフィール画像">
            </output>
            <input class="form-image__in" type="file" id="file-input"></input>
            <button class="form-image__btn" type="button" id="file-button" onclick="clickUpload()">画像を選択する</button>
            @error('')
            <p class="form-error"></p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">ユーザー名</label>
            <input class="form-input" type="text" name="name">
            @error('')
            <p class="form-error"></p>
            @enderror
        </div>
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



<script>
    function clickUpload(){

        const button = document.getElementById("file-button");
        const input = document.getElementById("file-input");

        button.addEventListener("click", function(event) {
            if (input) {
                input.click();
            }
        }, false);
        
    }
</script>