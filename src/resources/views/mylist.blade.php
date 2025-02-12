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
</div>
@endsection