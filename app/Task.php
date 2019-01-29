<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function task_status() {
    	return $this->belongsTo('\App\TaskStatus');
    }

    public function user() {
    	return $this->belongsTo('\App\User');
    }

    public function contact() {
    	return $this->belongsTo('\App\Contact');
    }
}
