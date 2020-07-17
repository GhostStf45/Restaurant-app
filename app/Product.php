<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function categories(){
        return $this->belongsTo('App\Category', 'category_id');
    }
   /* public function drinks(){
        return $this->belongsTo('App\Drink', 'drink_id');
    }*/
}
