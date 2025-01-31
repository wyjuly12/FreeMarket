@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/purchase.css') }}">
@endsection

@section('content')
    <div class="purchase-content">
        <div class="content-left">
            <div class="content-group">
                <img class="content-image" src="{{$item->image}}" alt="画像">
                <h2 class="content-name">{{$item->goods}}</h2>
                <p class="content-price">￥{{$item->price}}</p>
            </div>     
            <div class="content-group">
                <h3 class="content-title">支払方法</h3>
                <select class="content-select" name="payment" >
                    <option hidden id="select" >支払方法を選択してください</option>
                    <option id="select" value="コンビニ支払い" >コンビニ支払い</option>
                    <option id="select" value="カード支払い">カード支払い</option>
                </select> 
            </div>
            <div class="content-group">
                    <h3 class="content-title">送付先</h3>
                    <a class="content-link" href="/purchase/address/:{{$item->id}}">住所変更</a>
            </div>                    
            <div class="content-group_sub">
                    <p class="content-text">郵便番号</p>
                    <p class="content-text">住所</p>    
            </div>
        </div>

        <div class="content-right">
            
            <table class="content-table">
                <tr class="table-row">
                    <th class="table-title">商品代金</th>
                    <td class="table-data">￥{{$item->price}}</td>
                </tr>
                <tr class="table-row">
                    <th class="table-title">支払方法</th>
                <td class="table-data" id="output" >

                </td>
                </tr>
            </table>

            <button class="content-button" type="button"><a href="#">購入する</a></button>
        </div>
    </div>


@endsection


