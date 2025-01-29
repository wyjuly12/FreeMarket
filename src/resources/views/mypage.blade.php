@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage-top">
    <div class="top-image">
       <img class="top-image" src="" alt="画像"><span>ユーザー名</span>  
    </div>
    <button class="top-link" type="button"><a href="/mypage/profile">プロフィールを変更</a></button>
</div>

<div class="mypage-menu">
    <ul class="menu-list">
        <li class="menu-link"><a href="#">出品した商品</a></li>
        <li class="menu-link"><a href="#">購入した商品</a></li>
    </ul>
</div>
<div class="item-content">
    <div class="content-group">
        <img class="content-image" src="" alt="商品画像">
        <p>商品名</p>
    </div> 
    <div class="content-group">
        <img class="content-image" src="" alt="商品画像">
        <p>商品名</p>
    </div> 
    <div class="content-group">
        <img class="content-image" src="" alt="商品画像">
        <p>商品名</p>
    </div> 
    <div class="content-group">
        <img class="content-image" src="" alt="商品画像">
        <p>商品名</p>
    </div> 
    <div class="content-group">
        <img class="content-image" src="" alt="商品画像">
        <p>商品名</p>
    </div> 
</div>
@endsection