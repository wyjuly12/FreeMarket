@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/profile.css') }}">
@endsection

@section('content')

<div class="profile-form">
    <div class="form-title">
        <h2>プロフィール設定</h2>
    </div>
    <form action="/" method="post">
        @csrf
        <div class="form-image" enctype="multipart/form-data">
            <output class="form-image__out" id="file-output">
                <img src="{{ asset('/image/Bag.jpg') }}" alt="プロフィール画像" >
            </output>
            <input class="form-image__in" type="file" id="file-input" name="photo" onchange="fileOutput()"></input>
            <button class="form-image__btn" type="button" id="file-button" onclick="clickUpload()">画像を選択する</button>
            @error('')
            <p class="form-error"></p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">ユーザー名</label>
            <input class="form-input" type="text" name="name" value="">
            @error('')
            <p class="form-error"></p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">郵便番号</label>
            <input class="form-input" type="text" name="postcode" value="">
            @error('')
            <p class="form-error"></p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">住所</label>
            <input class="form-input" type="text" name="address" value="">
            @error('')
            <p class="form-error"></p>
            @enderror
        </div>
        <div class="form-group">
            <label for="" class="form-label">建物名</label>
            <input class="form-input" type="text" name="building" value="">
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

    document.getElementById('file-input').onchange = function(event){
                document.getElementById('file-output').innerHTML = '';

                var files = event.target.files;

                for (var i = 0, f; f = files[i]; i++) {
                var reader = new FileReader;
                reader.readAsDataURL(f);

                reader.onload = (function(theFile) {
                    return function (e) {
                        var div = document.createElement('div');
                        div.className = 'reader_file';
                        div.innerHTML += '<img class="reader_image" src="' + e.target.result + '" />';
                        document.getElementById('file-output').insertBefore(div, null);
                    }
                })(f);
            }
        };

</script>