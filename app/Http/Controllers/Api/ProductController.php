<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function index()
    {    

        $products=Product::all();

         return response()->json(["products"=>$products]);
    }

   
    public function store(Request $request)
    {
        
          $product=new Product();

        $product->offer_price=$request->offer_price; 
         $product->name=$request->name; 
         $product->manufacturer_id=1;
         $product->regular_price=$request->regular_price;
         $product->description=$request->description;
        //  $product->photo=$request->photo;
         $product->product_category_id=1;
         $product->product_section_id=1;
         $product->is_featured=Null;
         $product->star=Null;
         $product->is_brand=Null;
         $product->offer_discount=1;
         $product->uom_id=1;
         $product->weight=$request->weight;
         $product->barcode=$request->barcode;
         $product->product_type_id=1;
         $product->product_unit_id=1;

                if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products'), $filename);
            $product->photo = $filename;
        }

          $product->save();

        return response()->json([
            'message' => 'Stock saved successfully'           
        ]);

    }
    
       
    


    public function show(string $id)
    {
         $product=Product::find($id);        
            return response()->json(["product"=>$product]);
    }

    
    public function update(Request $request, string $id)
    {
         $product=product::find($id);

         $product->name=$request->name; 
        $product->offer_price=$request->offer_price; 
         $product->manufacturer_id=1;
         $product->regular_price=$request->regular_price;
         $product->description=$request->description;
         $product->photo=null;
         $product->product_category_id=1;
         $product->product_section_id=1;
         $product->is_featured=null;
         $product->star=null;
         $product->is_brand=null;
         $product->offer_discount=1;
         $product->uom_id=1;
         $product->weight=$request->weight;
         $product->barcode=$request->barcode;
         $product->product_type_id=1;
         $product->product_unit_id=1;
         
         $product->save();


        return response()->json([
            'message' => 'Stock saved successfully'           
        ]);
    }

  
    public function destroy(string $id)
    {
        $product=Product::find($id);  
        $product->delete();
        return json_encode(["message"=>"Successfully Deleted"]);
    }
}
