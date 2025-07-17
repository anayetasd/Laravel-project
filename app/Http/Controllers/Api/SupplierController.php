<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchases\Supplier;

class SupplierController extends Controller
{
    
    public function index()
    {
        $suppliers=Supplier::all();
        return response()->json(["suppliers"=>$suppliers]);
    }

   
    public function store(Request $request)
    {
        
        
        
        $supplier=new Supplier();
      
             
         $supplier->name=$request->name;
         $supplier->email=$request->email;
         $supplier->mobile=$request->mobile;
         $supplier->photo=null;
         $supplier->save();

     
     
           
      
        return response()->json([
            'message' => 'Customer saved successfully'           
        ]);

    }

 
    public function show( $id)
    {
          $supplier=supplier::find($id);        
            return response()->json(["supplier"=>$supplier]);

    }

    public function update(Request $request, $id)
    {

        $supplier=Supplier::find($id);
         $supplier->name=$request->name; 
        $supplier->mobile=$request->mobile; 
        $supplier->email=$request->email; 
        $supplier->photo=null; 
        $supplier->update();

       return response()->json([
            'message' => "Successfully updated"          
        ]);

    }

    
    public function destroy( $id)
    {
         $supplier=supplier::find($id);  
        $supplier->delete();
          return json_encode(["message"=>"Successfully Deleted"]);
    }
}
