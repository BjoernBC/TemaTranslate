<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $fillable = [
        'country_code', 'name'
    ];

    protected $casts = [
        'country_code' => 'string',
        'name' => 'string'
    ];
}
