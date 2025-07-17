<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Libraries\Core\File;
use App\Models\Inventory\RawMaterial;

class RawMaterialController extends Controller
{
    public function index()
    {
        $rawMaterials=DB::table("raw_materials")->get();
       return view("pages.Inventory.rawMaterial.index",["rawMaterials"=>$rawMaterials]);
    }

   
    public function create()
    {
         return view("pages.Inventory.rawMaterial.create");
    }

   
    public function store(Request $request)
    {
        $rawMaterial=new RawMaterial();
        $rawMaterial->name=$request->name;
        $rawMaterial->unit=$request->unit;
        $rawMaterial->price_per_unit=$request->price_per_unit;
 
        $rawMaterial->save();


          return redirect("rawMaterials");
    }

   
    public function show($id)
    {
        $rawMaterial=RawMaterial::find($id);
        return view("pages.Inventory.rawMaterial.show",["rawMaterial"=>$rawMaterial]);
    }

    
    public function edit($id)
    {
        $rawMaterial=RawMaterial::find($id);
        return view("pages.Inventory.rawMaterial.edit",["rawMaterial"=>$rawMaterial]);
    }

   
    public function update(Request $request, rawMaterial $rawMaterial)
    {   
        $rawMaterial->name=$request->name;
        $rawMaterial->unit=$request->unit;
        $rawMaterial->price_per_unit=$request->price_per_unit;
 
        $rawMaterial->update();


        return redirect("rawMaterials");
    }



    public function confirm($id){
         $rawMaterial=RawMaterial::find($id);
        return view("pages.Inventory.rawMaterial.confirm",["rawMaterial"=>$rawMaterial]);
    }


    public function destroy(rawMaterial $rawMaterial)
    {
         $rawMaterial->delete();
        return redirect("rawMaterials");
    }
}
