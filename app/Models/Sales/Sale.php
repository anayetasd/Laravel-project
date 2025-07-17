<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

use App\Models\Sales\Customer;

class Sale extends Model
{
    public $timestamps = false;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
