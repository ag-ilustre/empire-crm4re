<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public $timestamps = false; //table timestamps column

    //a stage has many contacts
    public function contacts() {
         return $this->hasMany('\App\Contact');
    }
}
