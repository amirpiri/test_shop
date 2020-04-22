<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class);
    }
}
