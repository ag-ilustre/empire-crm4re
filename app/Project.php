<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

    // public $timestamps = false; //table timestamps column

    // a project belongs to many contacts
    public function contacts() {
        return $this->belongsToMany('\App\Contact');
    }
    

    //a project belongs to a property_status
    public function property_status() {
    	return $this->belongsTo('\App\PropertyStatus');    	
    }


}
