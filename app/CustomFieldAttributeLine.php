<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFieldAttributeLine extends Model
{

    protected $fillable = ["nama", "order", "is_active", "custom_field_category_id"];

    public function CustomFieldCategory()
    {
        return $this->belongsTo("App\CustomFieldCategory");
    }

    public function CustomFieldAttributeLineValues()
    {
        return $this->hasMany("App\CustomFieldAttributeLineValue");
    }
}
