<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $primaryKey = 'country_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'country_code', 'name'
    ];

    protected $casts = [
        'country_code' => 'string',
        'name' => 'string'
    ];

    public function translations()
    {
        return $this->hasMany('App\ProductTranslation');
    }
}
