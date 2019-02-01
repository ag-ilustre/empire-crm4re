<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    public $timestamps = false; //table timestamps column

    public function tasks() {
    	return $this->hasMany('App\Task');
    }
}
