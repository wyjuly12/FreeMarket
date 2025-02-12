<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExhibitionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|mimes:jpeg,png',
            'category_id' => 'required',
            'condition_id' => 'required',
            'goods' => 'required',
            'explanation' => 'required|max:255',
            'price' => 'required|integer|min:0'
        ];
    }

    public function messages()
        {
        return [
            'image.required' => '画像を選択してください',
            'image.mimes' => '画像は「.jpeg」または「.png」にしてください',
            'category_id.required' => 'カテゴリを選択してください',
            'condition_id.required' => '商品の状態を選択してください',
            'goods.required' => '商品名を入力してください',
            'explanation.required' => '商品の説明を入力してください',
            'explanation.max' => '255文字以内で入力してください',
            'price.required' => '販売価格を入力してください',
            'price.integer' => '販売価格は数値で入力してください',
            'price.max' => '0以上の数値で入力してください'
        ];
        }
}
