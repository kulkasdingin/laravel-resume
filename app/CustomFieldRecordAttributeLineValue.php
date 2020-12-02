<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFieldRecordAttributeLineValue extends Model
{

    protected $fillable = ["value", "custom_field_record_id", "custom_field_attribute_line_id"];

    public function CustomFieldAttributeLine()
    {
        return $this->belongsTo('App\CustomFieldAttributeLine');
    }

    public function CustomFieldRecord()
    {
        return $this->belongsTo('App\CustomFieldRecord');
    }
}
