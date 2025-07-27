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

    public function rawMaterial()
    {
    return $this->belongsTo(RawMaterial::class, 'raw_material_id');
    }

     public $timestamps = false;

     

            protected $fillable = [
            'production_date',
            'product_id',
            'raw_material_id',
            'raw_material_qty',
            'unit',
            'quantity_produced',
            'production_cost',
            'name',
            ];

}
