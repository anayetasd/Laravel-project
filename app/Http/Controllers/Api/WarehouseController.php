<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchases\Warehouse;

class WarehouseController extends Controller
{
    
    public function index()
    {
        $warehouses=Warehouse::all();

        return response()->json(["warehouses"=>$warehouses]);
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
