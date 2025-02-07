@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/exhibition.css') }}">
@endsection

@section('content')

<div class="exhibition-form">
    <div class="form-title">
        <h2>商品の出品</h2>
    </div>

    <form action="/sell" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-image">
            <output class="form-image__out" >
                <img class="form-image__out"  id="file-output" >
            </output>
            <input class="form-image__in" type="file" id="file-input" name="image" onchange="fileOutput(image)"></input>
            <button class="form-image__btn" type="button" id="file-button" onclick="clickUpload()">画像を選択する</button>
        </div>
        <div class="form-group">
            <h3 class="group-title" >商品の詳細</h3>
            <div class="form-section">
                <label class="section-title">カテゴリー</label>
                <div class="category-input">
                    @foreach($categories as $category)
                    <input type="checkbox" name="category_id[]" id="category_id{{$category->id}}" value="{{$category->id}}">
                    <label for="category_id{{$category->id}}">{{$category->category}}</label>
                    @endforeach
                </div>
            </div>
            <div class="form-section">
                <label class="section-title">商品の状態</label>
                <select class="form-input" name="condition_id" id="conditon">
                    <option hidden>選択してください</option>
                    @foreach($conditons as $conditon)
                    <option id="conditon" value="{{$conditon->id}}">{{$conditon->condition}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="form-group">
            <h3 class="group-title">商品名と説明</h3>
            <div class="form-section">
                <label class="section-title">商品名</label>
                <input class="form-input" type="text" name="goods">
            </div>
            <div class="form-section">
            <label class="section-title">商品の説明</label>
                <textarea  class="form-input__textarea" rows="10" name="explanation" id=""></textarea>
            </div>  
            <div class="form-section">
                <label class="section-title">販売価格</label>
                <input class="form-input" type="text" name="price">
            </div>   
        </div>
        
        <div class="form-button">
            <button type="submit">出品する</button>
        </div>
    </form>
</div>

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


    function fileOutput(image){

        var fileData = new FileReader();
        fileData.onload = (function(){
            document.getElementById('file-output').src = fileData.result;
        });
        fileData.readAsDataURL(image.files[0]);
    }

</script>




@endsection