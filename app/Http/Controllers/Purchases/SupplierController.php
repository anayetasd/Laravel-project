<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Purchases\Supplier;
use App\Libraries\Core\File;

class SupplierController extends Controller
{
    
    public function index()
    {
                      
        $suppliers=DB::table("suppliers")->get();       
        return view("pages.purchases.supplier.index",["suppliers"=>$suppliers]);
    
    }

    
    public function create()
    {
         return view("pages.purchases.supplier.create");
    }

    
    public function store(Request $request)
    {
        
        $supplier=new supplier();
      
        $supplier->name=$request->name; 
        $supplier->mobile=$request->mobile; 
        $supplier->email=$request->email; 
        $supplier->photo=$request->photo; 
        
        $supplier->save();

         if($request->hasFile('photo')){
            //upload file
			$imageName=$supplier->id.'.'.$request->photo->extension();			
			$request->photo->move(public_path('img'),$imageName);

            //update database
            $supplier->photo=$imageName;
			$supplier->update();
		}

       
        return redirect("suppliers");
    }

    
    public function show($id)
    {
         $supplier=supplier::find($id);        
        return view("pages.purchases.supplier.show",["supplier"=>$supplier]);
    }

   
    public function edit($id)
    {
      
         $supplier=supplier::find($id);        
        return view("pages.purchases.supplier.edit",["supplier"=>$supplier]);
    }

    
    public function update(Request $request, supplier $supplier)
    {
        $supplier->name=$request->name; 
        $supplier->mobile=$request->mobile; 
        $supplier->email=$request->email; 
        $supplier->photo=$request->photo; 
        $supplier->update();

        if($request->hasFile('photo')){
            //upload file
			$imageName=$supplier->id.'.'.$request->photo->extension();			
			$request->photo->move(public_path('img'),$imageName);

            //update database
            $supplier->photo=$imageName;
			$supplier->update();
		}

        return redirect("suppliers");
    }

    public function history($id)
    {
        $supplier = Supplier::with('purchases')->findOrFail($id);

        return view('pages.purchases.supplier.history', compact('supplier'));
    }

   

    function confirm($id){
       $supplier=supplier::find($id);  
        
       return view("pages.purchases.supplier.confirm",["supplier"=>$supplier]);
    }
 
    public function destroy( $id)
    {
         $supplier->delete();
      return redirect("suppliers");
    }
}
