<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;         
use App\Models\Inventory\RawMaterial;

class Production extends Model
{
   public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function rawMaterial(){
        return $this->belongsTo(RawMaterial::class);
    }

     public $timestamps = false;
}
