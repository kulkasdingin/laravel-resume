<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{

    protected $fillable = ["is_active", "is_protected", "user_id", "first_name", "last_name", "profession", "photo", "address", "email", "birth_date", "phone", "gender", "password"];

    protected $hidden = ["password"];


    public function Profile()
    {
        return $this->belongsTo("App\Profile");
    }

    public function CustomFieldCategories()
    {
        return $this->hasMany("App\CustomFieldCategory");
    }
}
