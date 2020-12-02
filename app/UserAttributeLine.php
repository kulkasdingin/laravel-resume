<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAttributeLine extends Model
{

    protected $fillable = ["name", "value", "order", "user_id"];

    public function Profile()
    {
        return $this->belongsTo("App\Profile");
    }
}
