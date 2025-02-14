@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/purchase.css') }}">
@endsection

@section('content')
    <div class="purchase-content">
        <form class="purchase-form" action="" method="post">
            @csrf
            <div class="form-left">
                <div class="form-group__top">
                <div class="form-group__top-left">
                    <img class="form-image" src="{{ asset($item->image) }}" alt="画像">
                </div>
                <div class="form-form__top-right">
                    <h2 class="form-name">{{$item->goods}}</h2>
                    <p class="form-price">￥<span>{{$item->price}}</span>(税込)</p>
                </div>
            </div>      
            <div class="form-group">
                <h3 class="form-title">支払方法</h3>
                <select class="form-select" id="select" for="payment" name="payment" onchange="showSelect()" >
                    <option id="payment" hidden>支払方法を選択してください</option>
                    <option id="payment" value="1" {{ old('payment') == 1 ? 'selected' : '' }}>コンビニ支払い</option>
                    <option id="payment" value="2" {{ old('payment') == 2 ? 'selected' : '' }}>カード支払い</option>
                </select> 
                @error('payment')
                    <p class="form-error">{{$errors->first('payment')}}</p>
                @enderror
            </div>
            <div class="form-group">
                <h3 class="form-title">配送先</h3>
                <a class="form-link" href="/purchase/address/:{{$item->id}}">変更する</a>
            </div>                    
            <div class="form-group_sub">
                <label class="form-label" for="postcode">郵便番号</label>
                <input class="form-input__disable" type="text" name="postcode" id="postcode" value="{{$person->postcode}}" disabled>
                <label class="form-label" for="address">住所</label>
                <input type="text" class="form-input__disable" name="address" id="address" value="{{$person->address}}{{$person->building}}" disabled>    
            </div>
            </div>
            <div class="form-right">    
            <table class="form-table">
                <tr class="table-row">
                    <th class="table-title">商品代金</th>
                    <td class="table-data">￥{{$item->price}}</td>
                </tr>
                <tr class="table-row"><th class="table-title">支払方法</th>
                <td class="table-data" id="output">選択してください</td>
                </tr>
                </table>
                <button class="form-button" type="submit">購入する</button>
            </div>
            <div class="form-hidden">
            <input type="text" name="buy_flag" id="" value="{{$person->user_id}}" hidden>
            </div>
        </form>
    </div>

    <script>
        showSelect(){

            let element = getElementById('select');
            let output =  getElementById('output');

            addEventListener('change',() =>{
                if(element.option[1]){
                    output.innerText = "コンビニ支払い";
                }else{
                    output.innerText = "カード支払い";
                }
            });
        }

    </script>


@endsection


