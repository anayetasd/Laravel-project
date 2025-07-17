<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MoneyReceiptDetail;
use App\Models\Sales\Customer;
class MR extends Model
{
    protected $table = 'money_receipts';

    protected $fillable = [
        'customer_id',
        'remark',
        'receipt_total',
        'discount',
        'vat',
    ];

    public $timestamps = false;


     public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');

     }

     public function mrDetails()
      {
         return $this->hasMany(MoneyReceiptDetail::class, 'money_receipt_id');
      }

     
  
       

    
}
