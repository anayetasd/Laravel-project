<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Transaction_type;

use App\Models\Purchases\Warehouse;

class Stock extends Model
{

   

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
      public function transaction_type(){
        return $this->belongsTo(Transaction_type::class);
    }

    protected $fillable = ['product_id', 'quantity'];


     public $timestamps = false;
}
