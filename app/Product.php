<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function categories(){
        return $this->belongsTo('App\Category', 'category_id');
    }
     //Relacion One to Many / de uno a muchos
     public function comments (){
        return $this->hasMany('App\Comment');
    }
    public function product()
    {
        return $this->hasMany('App\Model\Promotion');
    }
   /* public function drinks(){
        return $this->belongsTo('App\Drink', 'drink_id');
    }*/
}
