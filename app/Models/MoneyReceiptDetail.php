<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class MoneyReceiptDetail extends Model
{
    protected $table="money_receipt_details";
     public $timestamps = false; 

        protected $fillable = [
        'money_receipt_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
    ];

            public function product()
        {
            return $this->belongsTo(Product::class);
        }

}
