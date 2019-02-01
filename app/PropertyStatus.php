<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyStatus extends Model
{
    public $timestamps = false; //table timestamps column

    //a property_status has many projects
    public function projects() {
        return $this->hasMany('App\Project');
    }
}
