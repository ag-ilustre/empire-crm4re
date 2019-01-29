<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
	// task_status has many tasks
   public function tasks() {
   	    return $this->hasMany('\App\Task');
   	}
}
