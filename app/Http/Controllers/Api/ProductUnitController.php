<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Models\product\ProductUnit;

class ProductUnitController extends Controller
{
    
    public function index()
    {
         $productunits=DB::table("product_units")->get();
         return response()->json(["productunits"=>$productunits]);
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
