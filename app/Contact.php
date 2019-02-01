<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //a contact belongs to a stage
    public function stage() {
        return $this->belongsTo('App\Stage');
    }

    //a contact belongs to a USER
    public function user() {
        return $this->belongsTo('App\User');
    }

    //a contact has many tasks
    public function tasks() {
    	return $this->hasMany('App\Task');
    }
}
