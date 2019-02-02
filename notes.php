//from User.php

class User extends Model
{
    //a user has many contacts
    public function contacts() {
        return $this->hasMany('\App\Contact');
    }

    //a user belongs to a role
    public function role() {
        return $this->belongsTo('\App\Role');
    }
}
