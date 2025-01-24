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

}
