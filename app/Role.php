<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false; //table timestamps column

    //a role has many user
    public function users() {
         return $this->hasMany('App\User');
    }
}
