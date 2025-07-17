<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Product\ProductUnit; 
use App\Models\Product\ProductSection; 
use App\Models\Product\ProductCategory; 
use App\Models\Product; 

use App\Libraries\Core\File; 

class ProductController extends Controller
{
    function index(){
        // $products=DB::table("products")->get();

        $products = Product::paginate(8);
        return view("pages.Inventory.product.index",["products"=>$products]);
    }
    function create(){

        $product_units = ProductUnit::all();
        $product_sections = ProductSection::all();
        $product_categories = ProductCategory::all();

        return view(' pages.Inventory.product.create', compact('product_units', 'product_sections', 'product_categories'));

    }
    function store(Request $request){

        $product=new Product();
        $product->name=$request->name;
        $product->offer_price=$request->offer_price;
        $product->manufacturer_id=1;
        $product->regular_price=$request->regular_price;
        $product->description="Na";
       
        $product->product_category_id=$request->product_category_id;
        $product->product_section_id=$request->product_section_id;
        $product->uom_id=1;
        $product->barcode=$request->barcode;
        $product->product_type_id=1;
        $product->product_unit_id=$request->product_unit_id;
        $product->star=1;
        $product->offer_discount=10;
        $product->save();

        if($request->hasFile('photo')){
            $imageName=$product->id.'.'.$request->photo->extension();
            $request->photo->move(public_path('img'),$imageName);

            $product->photo=$imageName;
            $product->update(); 
        }

        return redirect("products");

    }
    function show($id){
        $product=Product::find($id);
        return view("pages.inventory.product.show",["product"=>$product]);
    }
    function edit($id){
        $product=Product::find($id);
        $sections=ProductSection::all();
      
        return view("pages.inventory.product.edit",["product"=>$product,"sections"=>$sections]);
    }
    function update(Request $request,product $product){
       $product->name=$request->name;
        $product->offer_price=$request->offer_price;
        $product->manufacturer_id=1;
        $product->regular_price=$request->regular_price;
        $product->description="Na";
        //$product->photo=$request->photo;
        $product->product_category_id=1;
        $product->product_section_id=$request->product_section_id;
        $product->uom_id=1;
        $product->barcode=$request->barcode;
        $product->product_type_id=1;
        $product->product_unit_id=1;
        $product->star=1;
        $product->offer_discount=10;
        $product->update();

        if($request->hasFile('photo')){
            //upload file
			$imageName=$product->id.'.'.$request->photo->extension();			
			$request->photo->move(public_path('img'),$imageName);

            //update database
            $product->photo=$imageName;
			$product->update();
		}

        return redirect("products");

    }


    function confirm($id){
        $product=Product::find($id);
        return view("pages.inventory.product.confirm", ["product"=>$product]);
    }
    function destroy(product $product){
        $product->delete();
        return redirect("products");
    }

}
