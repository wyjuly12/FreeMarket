@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endsection

@section('content')

<div class="profile-form">
    <div class="form-title">
        <h2>プロフィール設定</h2>
    </div>
    <form action="/mypage/profile" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-image" enctype="multipart/form-data" >
            <output class="form-image__out" >
                <img class="form-image__out" src="{{ asset($person->photo) }}" id="file-output" >
            </output>
            <input class="form-image__in" type="file" id="file-input" name="photo" onchange="fileOutput(photo)"></input>
            <button class="form-image__btn" type="button" id="file-button" onclick="clickUpload()">画像を選択する</button>
            @error('photo')
            <p class="form-error">{{$errors->first('photo')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">ユーザー名</label>
            <input class="form-input" type="text" name="name" value="{{$user->name}}">
            @error('name')
            <p class="form-error">{{$errors->first('name')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">郵便番号</label>
            <input class="form-input" type="text" name="postcode" value="{{$person->postcode}}">
            @error('postcode')
            <p class="form-error">{{$errors->first('postcode')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">住所</label>
            <input class="form-input" type="text" name="address" value="{{$person->address}}">
            @error('address')
            <p class="form-error">{{$errors->first('address')}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">建物名</label>
            <input class="form-input" type="text" name="building" value="{{$person->building}}">
            @error('building')
            <p class="form-error">{{$errors->first('building')}}</p>
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


    function fileOutput(photo){

        var fileData = new FileReader();
        fileData.onload = (function(){
            document.getElementById('file-output').src = fileData.result;
        });
        fileData.readAsDataURL(photo.files[0]);
    }

</script>