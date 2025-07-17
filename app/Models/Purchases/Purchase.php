<?php

namespace App\Models\Purchases;

use Illuminate\Database\Eloquent\Model;
use App\Models\Purchases\Suppliers;
use App\Models\Purchases\purchaseDetail;

class Purchase extends Model
{
   protected $fillable = ['supplier_id', 'purchase_date', 'delivery_date', 'shipping_address', 'purchase_total', 'paid_amount', 'remark', 'status_id', 'discount', 'vat'];

    public function details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

     public $timestamps = false;


}
