<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function opportunity_stage() {
    	return $this->belongsTo('\App\OpportunityStage');
    }

    public function user() {
    	return $this->belongsTo('\App\User');
    }
}
