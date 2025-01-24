<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorize extends Model
{
    use HasFactory;

        protected $fillable = [
            'item_id',
            'category_id'
        ];

        public function items(){
            return $this->belongsTo('App\Models\Item');
        }
        
        public function categories(){
            return $this->belongsTo('App\Models\Category');
        }


}
