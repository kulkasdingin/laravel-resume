<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFieldRecord extends Model
{
    public function CustomFieldCategory()
    {
        return $this->belongsTo('App\CustomFieldCategory');
    }
}
