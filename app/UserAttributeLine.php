<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAttributeLine extends Model
{
    public function Profile()
    {
        return $this->belongsTo("App\Profile");
    }
}
