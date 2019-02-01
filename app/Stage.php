<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    public function contacts() {
        return $this->belongsToMany('App\Contact', 'contact_stages')->withPivot("title", "note")->withTimestamps();
    }
}
