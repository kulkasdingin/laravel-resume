<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    public function Profile()
    {
        return $this->belongsTo("App\Profile");
    }

    public function CustomFieldCategory()
    {
        return $this->hasMany("App\CustomFieldCategory");
    }
}
