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
            'condition',
            'sell_flag',
            'buy_flag'
        ];

  
        public function categoies(){
            return $this->hasMany('App\Models\Categorize');
        }

        public function posts(){
            return $this->hasMany('App\Models\Posts');
        }

        public function favorites(){
            return $this->hasMany('App\Models\Favorite');
        }

        public function scopeGetSale($query , $user_id){
            $query->where('sell_flag', '!=' , $user_id );         
            }

        public function scopeMySell($query , $user_id){
            $query->where('sell_flag', '=' , $user_id);
        }

        public function scopeMyBuy($query , $user_id){
            $query->where('buy_flag', '=' , $user_id);
        }

        public function scopeSearchWord($keyword){
            if(! $keyword){
                where('goods','LIKE','%'.$keyword.'%');
            }
        }
}
