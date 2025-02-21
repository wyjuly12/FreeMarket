@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection

@section('content')
<div class="item-menu">
    <ul class="menu-list">
        <li class="menu-link"><a href="/">おすすめ</a></li>
        <li class="menu-link"><a href="/mylist">マイリスト</a></li>
    </ul>
</div>
@if(session('message'))
    <div class="item-notice">{{session('message')}}</div>
@endif
<div class="item-content" >
    @if(isset($items))
        @foreach($items as $item)
        <div class="content-group" >
            <a href="/item/:{{$item->id}}"><img class="content-image" src="{{ $item->image }}" alt="商品画像"></a>
            <span class="content-name">{{ $item->goods }}</span>
            @if($item->buy_flag != null)
                <span class="content-flag">【sold】</span>
            @endif
        </div> 
        @endforeach
    @endif
    @if(isset($favorites))
        @foreach($favorites as $favorite)
        <div class="content-group" >
            <a href="/item/:{{$favorite->getItemId()}}"><img class="content-image" src="{{ $favorite->getItemImage() }}" alt="商品画像"></a>
            <span class="content-name">{{ $favorite->getItemName() }}</span>
            @if($favorite->getItemSold() != null)
                <span class="content-flag">【sold】</span>
            @endif
        </div>
        @endforeach
    @endif
</div>


@endsection