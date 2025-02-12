@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage-top">
    <div class="top-image">
       <img class="top-image" src="{{ asset($person->photo)}}" alt="画像"><span>{{ $user->name }}</span>  
    </div>
    <button class="top-link" type="button"><a href="/mypage/profile" >プロフィールを変更</a></button>
</div>

<div class="mypage-menu">
    <ul class="menu-list">
        <li class="menu-link"><a href="/mypage/sell">出品した商品</a></li>
        <li class="menu-link"><a href="/mypage/buy">購入した商品</a></li>
    </ul>
</div>
<div class="item-content">
        @if(isset($items)) 
            @foreach($items as $item)
            <div class="content-group">
                <a href="/item/:{{$item->id}}"><img class="content-image" src="{{ asset($item->image) }}" alt="商品画像"></a>
                <span class="content-name">{{ $item->goods }}</span>
                @if($item->buy_flag != null)
                    <span class="content-flag">【sold】</span>
                @endif
                </div> 
            @endforeach
        @endif
</div>
@endsection