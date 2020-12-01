<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFieldCategory extends Model
{
    public function Cv()
    {
        return $this->belongsTo("App\Cv");
    }
}
