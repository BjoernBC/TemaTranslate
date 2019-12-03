<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];
    public function translations()
    {
        return $this->hasMany('App\ProductTranslation', 'product_sku', 'sku');
    }
}
