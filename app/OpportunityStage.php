<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpportunityStage extends Model
{
	// opportunity_stage has many contacts
    public function contacts() {
	    return $this->hasMany('\App\Contact');
	}
}
