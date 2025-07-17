<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Libraries\Core\File;
use App\Models\product\ProductCategory;

class ProductCategoryController extends Controller
{
    
    public function index()
    {
        $productcategorys=DB::table("Product_categories")->get();
        return response()->json(["productcategorys"=>$productcategorys]);
    }

    
    public function store(Request $request)
    {
        
    }

 
    public function show(string $id)
    {
        
    }

    public function filter(string $id){
         $productcategorys=DB::table("Product_categories")->where('product_section_id',$id)->get();
         return json_encode(["productcategorys"=>$productcategorys]);   
    }


  
    public function update(Request $request, string $id)
    {
        
    }

   
    public function destroy(string $id)
    {
        
    }
}
