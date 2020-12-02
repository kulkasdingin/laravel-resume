<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFieldRecordAttributeLineValue extends Model
{
    public function CustomFieldAttributeLine()
    {
        return $this->belongsTo('App\CustomFieldAttributeLine');
    }

    public function CustomFieldRecord()
    {
        return $this->belongsTo('App\CustomFieldRecord');
    }
}
