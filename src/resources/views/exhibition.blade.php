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
                <img class="form-image__out"  id="file-output">
            </output>
            <input class="form-image__in" type="file" id="file-input" name="image" onchange="fileOutput(image)"></input>
            <button class="form-image__btn" type="button" id="file-button" onclick="clickUpload()">画像を選択する</button>
            @error('image')
                <span class="form-error">{{$errors->first('image')}}</span>
            @enderror
        </div>
        <div class="form-group">
            <h3 class="group-title" >商品の詳細</h3>
            <div class="form-section">
                <label class="section-title">カテゴリー</label>
                <div class="category-input">
                    @foreach($categories as $category)
                    <input type="checkbox" name="category_id[]" id="category_id{{$category->id}}" value="{{$category->id}}" {{ !empty(old("category_id")) && in_array((string)$category->id, old("category_id"), true) ? 'checked' : ''}}>
                    <label for="category_id{{$category->id}}">{{$category->category}}</label>
                    @endforeach
                </div>
                @error('category_id')
                    <span class="form-error">{{$errors->first('category_id')}}</span>
                @enderror
            </div>
            <div class="form-section">
                <label class="section-title">商品の状態</label>
                <select class="form-input" name="condition_id" id="conditon">
                    <option hidden value="">選択してください</option>
                    @foreach($conditons as $conditon)
                    <option  id="conditon" value="{{$conditon->id}}" {{ old('condition_id') == $conditon->id ? 'selected' : '' }}>{{$conditon->condition}}</option>
                    @endforeach 
                </select>
                @error('condition_id')
                    <span class="form-error">{{$errors->first('condition_id')}}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <h3 class="group-title">商品名と説明</h3>
            <div class="form-section">
                <label class="section-title">商品名</label>
                <input class="form-input" type="text" name="goods" value="{{ old('goods') }}">
                @error('goods')
                    <span class="form-error">{{$errors->first('goods')}}</span>
                @enderror
            </div>
            <div class="form-section">
            <label class="section-title">商品の説明</label>
                <textarea  class="form-input__textarea" rows="10" name="explanation" id="">{{ old('explanation') }}</textarea>
                @error('explanation')
                    <span class="form-error">{{$errors->first('explanation')}}</span>
                @enderror
            </div>  
            <div class="form-section">
                <label class="section-title">販売価格</label>
                <input class="form-input" type="text" name="price" value="{{ old('price') }}">
                @error('price')
                    <span class="form-error">{{$errors->first('price')}}</span>
                @enderror
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