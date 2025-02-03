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
            <p class="content-text">￥<span>{{$item->price}}</span>(税込)</p>
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
                    @foreach($categories as $category)
                        @if($item->checkCategory($category,$item) =='yes')
                        <span>{{$category->category}}</span>
                        @endif
                    @endforeach           
                </div>               
            </div>
            <div class="content-infomation">
                <label class="content-label" for="">商品の状態</label>
                <span class="content-condition">{{$item->getCondition()}}</span>
            </div>
            <div class="content-comunication">
                <img class="content-photo" src="" alt="">
                @if($item->posts != null)
                    @foreach($item->posts as $object)
                    <div class="content-comment_view">{{$object->getUserId()}}</div>
                    <div class="content-comment_view">{{$object->getComment()}}</div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="content-group">
            <h3>商品へのコメント</h3>
                <form  action="/item/:{{$item->id}}" method="post">
                    @csrf
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <textarea class="content-comment__input" name="comment"  rows="10">{{ old('comment')}}</textarea>
                    @error('comment')
                        <span class="content-error">{{$errors->first('comment')}}</span>
                    @enderror
                    @if (Auth::check())
                    <button class="content-button" type="submit">コメントを送信する</button>
                        @else
                        <button class="content-button" type="button"><a href="/login">コメントを送信する</a></button>
                    @endif 
                </form>
        </div>
    </div>

</div>


@endsection