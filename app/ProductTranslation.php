<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    //
    protected $guarded = ['id'];
    // protected $fillable = ['title'];
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function locale()
    {
        return $this->belongsTo('App\Locale');
    }
}
