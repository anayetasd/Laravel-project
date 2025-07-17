<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product\ProductSection;

class ProductSectionController extends Controller
{
   
    public function index()
    {   
         $Productsections=DB::table("Product_sections")->get();
         return response()->json(["productsections"=>$Productsections]);
    }

   
    public function store(Request $request)
    {
        
    }

   
    public function show(string $id)
    {
        
    }

     public function filter($id)
     {
     $productsections = DB::table('product_sections')->where('product_unit_id', $id)->get();

     return response()->json([
          'productsections' => $productsections  
     ]);
     }

   
    public function update(Request $request, string $id)
    {
        
    }

    
    public function destroy(string $id)
    {
        
    }
}
