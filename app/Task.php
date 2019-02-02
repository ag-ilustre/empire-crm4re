<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	//a task belongs to a task_status
    public function task_status() {
    	return $this->belongsTo('\App\TaskStatus');
    }

    //a task belongs to a contact
    public function contact() {
    	return $this->belongsTo('\App\Contact');
    }
}
