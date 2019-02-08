<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	
	//a task belongs to a task_status
    public function task_status() {
    	return $this->belongsTo('\App\TaskStatus');
    }

    //a task belongs to a contact
    public function contact() {
    	return $this->belongsTo('\App\Contact');
    }
}
