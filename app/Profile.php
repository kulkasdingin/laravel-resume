<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
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
