<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessNumber extends Model
{
    //
    protected $fillable = [
        'json_id', 'json_key', 'json_value',
    ];

    protected $hidden = [
        'updated_at', 'created_at', 
    ];
}
