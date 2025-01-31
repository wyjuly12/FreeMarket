@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/item.css') }}">
@endsection

@section('content')

<div class="item-content">
    <div class="content-left">
        <img class="content-image" src="{{$item->image}}" alt="商品画像">
    </div>
    <div class="content-right">
        <div class="content-group">
            <h2 class="content-title">{{$item->goods}}</h2>
            <p class="contet-text">￥{{$item->price}}(税込)</p>
            @if(!Auth::check())
            <button class="content-button__disabled"disabled="disabled">ログイン後に購入手続きができます</button>          
            @elseif($item->buy_flag != null)
            <button class="content-button__disabled"disabled="disabled">この商品は購入されました</button>
            @else
            <button class="content-button" type="button"><a href="/purchase/:{{ $item->id }}">購入手続きへ</a></button>
            @endif
        </div>
        <div class="content-group">
            <h3>商品説明</h3>
            <p class="contet-text">{{$item->explanation}}</p>
        </div>
        <div class="content-group">
            <h3>商品の情報</h3>
            <div class="content-infomation">
                <label class="content-label" for="">カテゴリ</label>
                <div class="category-output">
                <!--  -->
                </div>               
            </div>
            <div class="content-infomation">
                <label class="content-label" for="">商品の状態</label>
                <span class="content-condition">{{$item->getCondition()}}</span>
            </div>
        </div>
        <div class="content-group">
            <img class="content-photo" src="" alt="">
            <span class="content-user">user</span>
        </div>
        <div class="content-group">
            <h3>商品へのコメント</h3>
            @if (Auth::check())
                <textarea class="content-comment"name="comment"  rows="10"></textarea>
                <form class="content-button__form"action="#" method="post">コメントを送信する</form>
            @else
                <textarea class="content-comment"  rows="10" disabled placeholder="ログイン後にコメントができます。"></textarea>
                <p class="content-error"></p>
                <button class="content-button" type="button"><a href="/login">ログインはこちらから</a></button>
            @endif           
        </div>
    </div>

</div>


@endsection