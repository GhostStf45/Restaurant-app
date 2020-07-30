<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    //
    public function users()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
