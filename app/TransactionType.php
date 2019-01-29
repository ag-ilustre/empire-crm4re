<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
	// transaction_type has many properties
   public function properties() {
   	    return $this->hasMany('\App\Property');
   	}
}
