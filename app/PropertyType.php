<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
	// property_type has many properties
   public function properties() {
   	    return $this->hasMany('\App\Property');
   	}
}
