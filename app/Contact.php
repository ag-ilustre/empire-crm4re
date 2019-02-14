<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    //a contact belongs to a stage
    public function stage() {
        return $this->belongsTo('\App\Stage');
    }

    //a contact belongs to a USER
    public function user() {
        return $this->belongsTo('\App\User');
    }

    //a contact has many tasks
    public function tasks() {
    	return $this->hasMany('\App\Task');
    }

    public function projects() {
        return $this->belongsToMany('\App\Contact', 'contact_projects', 'contact_id', 'project_id')->withPivot('property_description', 'property_status_id', 'total_contract_price', 'estimated_commission')->withTimestamps();
    }
}
