<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFieldRecord extends Model
{

    protected $fillable = ["order", "custom_field_category_id"];

    public function CustomFieldCategory()
    {
        return $this->belongsTo('App\CustomFieldCategory');
    }

    public function CustomFieldAttributeLineValues()
    {
        return $this->hasMany("App\CustomFieldAttributeLineValue");
    }
}
