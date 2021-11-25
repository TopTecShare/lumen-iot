<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessString extends Model
{
    //
    protected $fillable = [
        'json_id', 'key', 'value',
    ];

    protected $hidden = [
        'updated_at', 'created_at', 
    ];
}
