<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function property_type() {
    	return $this->belongsTo('\App\PropertyType');
    }

    public function opportunity_stage() {
    	return $this->belongsTo('\App\OpportunityStage');
    }

    public function contact() {
    	return $this->belongsTo('\App\Contact');
    }

    public function transaction_type() {
    	return $this->belongsTo('\App\TransactionType');
    }

    public function deal_status() {
    	return $this->belongsTo('\App\DealStatus');
    }
}
