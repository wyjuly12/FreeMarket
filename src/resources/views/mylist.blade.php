@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection

@section('content')
<div class="item-menu">
    <ul class="menu-list">
        <li class="menu-link"><a href="/" data-tab="top">おすすめ</a></li>
        <li class="menu-link"><a href="/?tab=mylist"  data-tab="mylist">マイリスト</a></li>
    </ul>
</div>
<div class="item-content" >
        @foreach($user->favorites as $favorite)
            <a href="/item/:{{$favorite->getItemId()}}"><img class="content-image" src="{{ $favorite->getItemImage() }}" alt="商品画像"></a>
            <span class="content-name">{{ $favorite->getItemName() }}</span>
        @endforeach
</div>
@endsection