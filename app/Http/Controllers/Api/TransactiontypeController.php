<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction_type;

class TransactiontypeController extends Controller
{
  
    public function index()
    {
        $transactions_type=Transaction_type::get();
        return response()->json($transactions_type);
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
