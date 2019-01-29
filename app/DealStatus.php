<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealStatus extends Model
{
	// deal_status has many properties
    public function properties() {
	    return $this->hasMany('\App\Property');
	}
}
