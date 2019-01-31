<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //a contact belongs to a stage
    public function stage() {
        return $this->belongsTo('\App\Stage');
    }

    public function user() {
        return $this->belongsTo('\App\User');
    }
}
