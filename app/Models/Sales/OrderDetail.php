<?php

namespace App\Models\Sales;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{       
    protected $fillable = ['order_id', 'product_id', 'qty', 'price', 'vat', 'discount'];
        public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
