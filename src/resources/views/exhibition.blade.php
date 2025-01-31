@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/exhibition.css') }}">
@endsection

@section('content')

<div class="exhibition-form">
    <div class="form-title">
        <h2>商品の出品</h2>
    </div>

    <form action="" method="post">

        <div class="form-image">
            <h3 class="group-title">商品画像</h3>
            <img class="image-title" src="" alt="">
            <input type="image" src="" alt="">
        </div>
        <div class="form-group">
            <h3 class="group-title" >商品の詳細</h3>
            <div class="form-section">
                <label class="section-title">カテゴリー</label>
                <div class="category-input">
                    @foreach($categories as $ca)
                    <input type="checkbox" name="category" id="category_{{$ca->id}}">
                    <label for="category_{{$ca->id}}">{{$ca->category}}</label>
                    @endforeach
                </div>
            </div>
            <div class="form-section">
                <label class="section-title">商品の状態</label>
                <select class="form-input" name="conditon" id="conditon">
                    <option hidden>選択してください</option>
                    @foreach($conditons as $co)
                    <option value="{{$co->id}}">{{$co->condition}}</option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="form-group">
            <h3 class="group-title">商品名と説明</h3>
            <div class="form-section">
                <label class="section-title">商品名</label>
                <input class="form-input" type="text" >
            </div>
            <div class="form-section">
            <label class="section-title">商品の説明</label>
                <textarea  class="form-input__textarea" rows="10" name="" id=""></textarea>
            </div>  
            <div class="form-section">
                <label class="section-title">販売価格</label>
                <input class="form-input" type="text" >
            </div>   
        </div>
        
        <div class="form-button">
            <button type="submit">出品する</button>
        </div>
    </form>
</div>


@endsection