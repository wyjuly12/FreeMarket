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
            return $this->belongsTo('App\Models\Item');
        }

        public function pepole(){
            return $this->belongsTo('App\Models\Person');
        }

}
