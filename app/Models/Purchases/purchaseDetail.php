<?php

namespace App\Models\Purchases;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Purchases\Purchase;


class purchaseDetail extends Model
{
    protected $fillable = ['purchase_id', 'product_id', 'unit_price', 'quantity', 'total_price'];

    
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function details()
    {
        return $this->belongsTo(Purchase::class);
    }

    
}
