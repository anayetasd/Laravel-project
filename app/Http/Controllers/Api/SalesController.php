<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\pagination\paginator;
use App\Models\Sales\Sale;
use App\Models\Sales\Customer;
use App\Libraries\core\File;
use App\Models\SalesDetails;

class SalesController extends Controller
{
   
    public function index()
    {
        $sales=Sale::all();
        return response()->json(["sales"=>$sales]);
    }

   
    public function store(Request $request)
    {
        
        $sale=new Sale();

       
        $sale->customer_id=$request->customer_id;
        $sale->total_amount=$request->total_amount;
        $sale->discount=$request->discount;
        $sale->status=$request->status;
        $sale->created_at=$request->created_at;
        $sale->save();

         return response()->json([
            'message' => 'Sales saved successfully'           
        ]);

    }

   
    public function show(string $id)
    {
          $sale=Sale::find($id);        
            return response()->json(["sale"=>$sale]);
    }

  
    public function update(Request $request, string $id)
    {
          $sale=Sale::find($id);


        $sale->customer_id=$request->customer_id;
        $sale->total_amount=$request->total_amount;
        $sale->discount=$request->discount;
        $sale->status=$request->status;
        $sale->created_at=$request->created_at;
        $sale->save();

         return response()->json([
            'message' => 'Sales updated successfully'           
        ]);
    }

   
    public function destroy(string $id)
    {
          $sale=Sale::find($id);  
        $sale->delete();
          return json_encode(["message"=>"Successfully Deleted"]);
    }
}
