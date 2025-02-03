@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/purchase.css') }}">
@endsection

@section('content')
    <div class="purchase-content">
        <form class="purchase-form" action="" method="post">
        <div class="form-left">
            <div class="form-group__top">
                <div class="form-group__top-left">
                    <img class="form-image" src="{{$item->image}}" alt="画像">
                </div>
                <div class="form-form__top-right">
                    <h2 class="form-name">{{$item->goods}}</h2>
                    <p class="form-price">￥<span>{{$item->price}}</span>(税込)</p>
                </div>
            </div>      
            <div class="form-group">
                <h3 class="form-title">支払方法</h3>
                <select class="form-select" name="payment" >
                    <option hidden id="select" >支払方法を選択してください</option>
                    <option id="select" value="コンビニ支払い" >コンビニ支払い</option>
                    <option id="select" value="カード支払い">カード支払い</option>
                </select> 
                @error('')
                <p class="form-error"></p>
                @enderror
            </div>
            <div class="form-group">
                <h3 class="form-title">配送先</h3>
                <a class="form-link" href="/purchase/address/:{{$item->id}}">変更する</a>
            </div>                    
            <div class="form-group_sub">
                <label class="form-label" for="">郵便番号</label>
                <input class="form-input__disable" type="text" name="postcode" id="" value="{{$person->postcode}}" disabled>
                <label class="form-label" for="">住所</label>
                <input type="text" class="form-input__disable" name="address" id="" value="{{$person->address}}{{$person->building}}" disabled>    
            </div>
        </div>

        <div class="form-right">    
            <table class="form-table">
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
            <button class="form-button" type="button"><a href="#">購入する</a></button>
        </div>
        </form>
    </div>


@endsection


