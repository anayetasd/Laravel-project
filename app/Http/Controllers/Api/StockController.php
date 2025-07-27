<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory\Stock;

class StockController extends Controller
{
     
    public function index()
    {
        $stocks=Stock::with("product","warehouse","transaction_type")->get();
        return response()->json(["stocks"=>$stocks]);
    }

   
    public function store(Request $request)
    {
        
        
        
        $stock=new Stock();
      
             
         $stock->product_id=$request->product_id;
         $stock->qty=$request->qty;
         $stock->transaction_type_id=$request->transaction_type_id;
         $stock->remark="purchases";
         $stock->created_at="2024-05-08";
         $stock->warehouse_id=1;
         
         $stock->save();


        return response()->json([
            'message' => 'Stock saved successfully'           
        ]);

    }

 
    public function show( $id)
    {
          $stock=Stock::with("product","warehouse","transaction_type")->findOrFail($id);        
            return response()->json(["stock"=>$stock]);

    }

    public function update(Request $request, $id)
    {

        $stock=Stock::find($id);
       
         $stock->product_id=$request->product_id;
         $stock->qty=$request->qty;
         $stock->transaction_type_id=$request->transaction_type_id;
         $stock->remark="purchases";
         $stock->created_at="2024-05-08";
         $stock->warehouse_id=1;
         
         $stock->save();


        return response()->json([
            'message' => 'Stock updated successfully'           
        ]);

    }

    
    public function destroy( $id)
    {
        $stock=Stock::find($id);  
        $stock->delete();
          return json_encode(["message"=>"Successfully Deleted"]);
    }
}
