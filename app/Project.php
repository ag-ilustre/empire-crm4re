<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false; //table timestamps column

    public function contacts() {
        return $this->belongsToMany('App\Contact', 'contact_projects')->withPivot("property_description", "property_status_id", "total_contract_price", "estimated_commission")->withTimestamps();
    }

    //a project belongs to a property_status
    public function property_status() {
    	return $this->belongsTo('App\PropertyStatus');    	
    }
}
