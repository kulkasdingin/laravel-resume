<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFieldAttributeLine extends Model
{
    public function CustomFieldCategory()
    {
        return $this->belongsTo("App\CustomFieldCategory");
    }

    public function CustomFieldAttributeLineValues()
    {
        return $this->hasMany("App\CustomFieldAttributeLineValue");
    }
}
