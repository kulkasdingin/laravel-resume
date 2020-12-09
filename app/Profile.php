<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = ["first_name", "last_name", "profesion", "photo", "address", "email", "birth_date", "phone", "gender", "user_id"];

    public function User()
    {
        return $this->belongsTo('App\Profile');
    }

    public function UserAttributeLines()
    {
        return $this->hasMany('App\UserAttributeLine');
    }

    public function Cvs()
    {
        return $this->hasMany("App\Cv");
    }
}
