<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cv extends Model
{
    use SoftDeletes;

    protected $fillable = ["is_active", "is_protected", "profile_id", "first_name", "last_name", "profession", "photo", "address", "email", "birth_date", "phone", "gender", "password", "file_name"];

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
