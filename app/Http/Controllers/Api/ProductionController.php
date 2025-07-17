<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Production\Production;

class ProductionController extends Controller
{
    public function index()
    {
        $productions=Production::all();
        return response()->json(["productions"=>$productions]);
        
    }



  
    public function store(Request $request)
    {
         $production=new Production();
      
         $production->production_date="2024-08-09";
         $production->product_id=$request->product_id;
             
         $production->raw_material_id=1;
         $production->quantity_produced=$request->quantity_produced;
         $production->unit=$request->unit;
         $production->production_cost=$request->production_cost;
         $production->created_at="2024-05-08";
         $production->name=$request->name;
         
         $production->save();


        return response()->json([
            'message' => 'Stock saved successfully'           
        ]);
    }

  
    public function show(string $id)
    {
          $production=Production::find($id);        
            return response()->json(["production"=>$production]);

    }

  
    public function update(Request $request, string $id)
    {
          $production=production::find($id);

          $production->production_date="2024-08-09";
         $production->product_id=$request->product_id;
             
         $production->raw_material_id=1;
         $production->quantity_produced=$request->quantity_produced;
         $production->unit=$request->unit;
         $production->production_cost=$request->production_cost;
         $production->created_at="2024-05-08";
         $production->name=$request->name;
         
         $production->save();


        return response()->json([
            'message' => 'Stock saved successfully'           
        ]);
    }

    
    public function destroy(string $id)
    {
        $production=Production::find($id);  
        $production->delete();
        return json_encode(["message"=>"Successfully Deleted"]);
    }
}
