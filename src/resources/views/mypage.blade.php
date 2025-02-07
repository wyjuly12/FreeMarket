@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage-top">
    <div class="top-image">
       <img class="top-image" src="" alt="画像"><span>{{ $user->name }}</span>  
    </div>
    <button class="top-link" type="button"><a href="/mypage/profile" >プロフィールを変更</a></button>
</div>

<div class="mypage-menu">
    <ul class="menu-list">
        <li class="menu-link"><a href="/mypage?tab=sell">出品した商品</a></li>
        <li class="menu-link"><a href="/mypage?tab=buy">購入した商品</a></li>
    </ul>
</div>
<div class="item-content">
    <div class="content-group">
        @if(isset($items)) 
        @foreach($items as $item)
            <a href="/item/:{{$item->id}}"><img class="content-image" src="{{ $favorite->image }}" alt="商品画像"></a>
            <span class="content-name">{{ $item->goods }}</span>
        @endforeach
        @endif
    </div> 
    

</div>


@endsection