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
            'postcode',
            'address',
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

        // リレーション(Itemsテーブル→Postsテーブル)
        public function posts(){
            return $this->hasMany('App\Models\Post');
        }

        // リレーション(Itemsテーブル→Postsテーブル)
        public function favorites(){
            return $this->hasMany('App\Models\Favorite');
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
            $item_data = item::find($item->id);
            $itemCategories = $item_data->categoies;
            foreach($itemCategories as $itemCategory){
                    if($itemCategory->category_id == $category_id){
                        $returnText = "yes";
                        return $returnText;
                    }
            }
        }




}

    
