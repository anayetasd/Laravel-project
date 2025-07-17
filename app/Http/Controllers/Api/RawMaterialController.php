<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory\RawMaterial;

class RawMaterialController extends Controller
{
    
    public function index()
    {
        $rawmaterials=RawMaterial::all();
        return response()->json(["rawmaterials"=>$rawmaterials]);
    }

   
    public function store(Request $request)
    {
          $rawmaterial=new RawMaterial();
      
             
         
         $rawmaterial->name=$request->name;
         $rawmaterial->unit=$request->unit;
         $rawmaterial->price_per_unit=$request->price_per_unit;
        
         $rawmaterial->save();


        return response()->json([
            'message' => 'Stock saved successfully'           
        ]);
    }

    public function show(string $id)
    {
         $rawmaterial=RawMaterial::find($id);        
            return response()->json(["rawmaterial"=>$rawmaterial]);
    }

   
    public function update(Request $request,$id)
    {
        $rawmaterial=RawMaterial::find($id);
       
         $rawmaterial->name=$request->name;
         $rawmaterial->unit=$request->unit;
         $rawmaterial->price_per_unit=$request->price_per_unit;
        
         $rawmaterial->save();


        return response()->json([
            'message' => 'Rawmaterials updated successfully'           
        ]);

        
    }

    
    public function destroy(string $id)
    {
        
         $rawmaterial=RawMaterial::find($id);  
        $rawmaterial->delete();
          return json_encode(["message"=>"Successfully Deleted"]);
    }
}
