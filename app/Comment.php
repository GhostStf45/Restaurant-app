<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    //Relacion de muchos a uno
    public function user(){
        return $this->belongsTo('App\User', 'user_id');

    }
    //Relacion de muchos a uno
    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }
}
