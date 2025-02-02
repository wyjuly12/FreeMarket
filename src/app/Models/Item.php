<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

        protected $fillable = [
            'goods',
            'price',
            'image',
            'explanation',
            'condition_id',
            'sell_flag',
            'buy_flag'
        ];


        // リレーション(Itemsテーブル→Categoriesテーブル)
        public function categoies(){
            return $this->hasMany('App\Models\Categorize');
        }  

        
 
        // リレーション(Itemsテーブル→Conditionsテーブル)
        public function condition(){
            return $this->belongsTo('App\Models\Condition');
        }

        public function getCondition(){
            return $this->condition->condition;
        }


        // 機能(商品一覧表示)
        public function scopeGetSale($query , $user_id){
            $query->where('sell_flag', '!=' , $user_id );         
            }

        // 機能(キーワード検索)
        public function scopeSearchWord($query , $keyword){
            if(!empty($keyword)){
                $query->where('goods','LIKE','%'.$keyword.'%');
            }
        }
        
        //機能(カテゴリ検索)
        public function checkCategory($category,$item){

            $category_id = $category->id;
            $item_date = item::find($item->id);
            $itemCategories = $item_date->categoies;
            foreach($itemCategories as $itemCategory){
                    if($itemCategory->category_id == $category_id){
                        $returnText = "yes";
                        return $returnText;
                    }
            }
        }






        public function posts(){
            return $this->hasMany('App\Models\Posts');
        }

        public function favorites(){
            return $this->hasMany('App\Models\Favorite');
        }


        public function scopeSerchSell($query , $user_id){
            $query->where('sell_flag', '=' , $user_id);
        }

        public function scopeSerchBuy($query , $user_id){
            $query->where('buy_flag', '=' , $user_id);
        }

        



}

    
