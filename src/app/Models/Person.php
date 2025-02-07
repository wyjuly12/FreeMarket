<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'postcode',
        'address',
        'building',
        'photo'
    ];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

}
