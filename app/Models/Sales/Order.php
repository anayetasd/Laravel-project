<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sales\OrderDetail;
use App\Models\Sales\Customer;

class Order extends Model
{

    protected $fillable = [
    'customer_id', 'order_date', 'delivery_date', 'shipping_address',
    'order_total', 'paid_amount', 'remark', 'status_id', 'discount', 'vat'
];


   public function customer() {
    return $this->belongsTo(Customer::class, 'customer_id');
    }

  public function orderDetails() {
    return $this->hasMany(OrderDetail::class);
}

     public $timestamps = false;

}
