<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawData extends Model
{
    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
