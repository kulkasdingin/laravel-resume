<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFieldCategory extends Model
{

    protected $fillable = ["nama", "order", "is_active", "cv_id"];

    public function Cv()
    {
        return $this->belongsTo("App\Cv");
    }

    public function CustomFieldRecords()
    {
        return $this->hasMany("App\CustomFieldRecord");
    }

    public function CustomFieldAttributeLines()
    {
        return $this->hasMany("App\CustomFieldAttributeLine");
    }
}
