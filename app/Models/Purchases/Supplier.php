<?php

namespace App\Models\Purchases;

use Illuminate\Database\Eloquent\Model;
use App\Models\Purchases\Purchases;

class Supplier extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'mobile', 'email', 'photo'];

    public function purchases()
{
    return $this->hasMany(Purchase::class);
}

}
