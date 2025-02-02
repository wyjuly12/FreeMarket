<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

        protected $fillable = [
            'item_id',
            'person_id',
            'comment'
        ];

        public function items(){
            return $this->belongsToMany('App\Models\Item')->withTimestamps();
        }

        public function pepole(){
            return $this->belongsToMany('App\Models\Person')->withTimestamps();
        }

}
