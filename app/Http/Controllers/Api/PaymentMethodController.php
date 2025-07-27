<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\Payment_method;
class PaymentMethodController extends Controller
{
    
    public function index()
    {
         $payments=Payment_method::get();
        return response()->json($payments);
    }

   
    public function store(Request $request)
    {
        
    }

   
    public function show(string $id)
    {
        
    }

   
    public function update(Request $request, string $id)
    {
        
    }

   
    public function destroy(string $id)
    {
        
    }
}
