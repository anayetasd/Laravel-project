<?php

namespace App\Models\Sales;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
     public function product()
{
    return $this->belongsTo(Product::class);
}
}
