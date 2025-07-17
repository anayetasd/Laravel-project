<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory\FinishedGoods;
class FinishedGoodController extends Controller
{
   
    public function index()
    {
         $finishedgoods=FinishedGoods::all();
        return response()->json(["finishedgoods"=>$finishedgoods]);
    }

    public function store(Request $request)
    {
        $finishedgood=new FinishedGoods();
      
             
         
         $finishedgood->product_code=$request->product_code;
         $finishedgood->product_name=$request->product_name;
         $finishedgood->quantity=$request->quantity;
         $finishedgood->price=$request->price;
         $finishedgood->order_date="2024-04-06";
         $finishedgood->finished_good_status="nice";
         $finishedgood->batch_number=1;
        
         $finishedgood->save();


        return response()->json([
            'message' => 'finishedgoods saved successfully'           
        ]);
    }

    
    public function show(string $id)
    {
         $finishedgood=FinishedGoods::find($id);        
            return response()->json(["finishedgood"=>$finishedgood]);
    }

   
    public function update(Request $request, string $id)
    {
         $finishedgood=FinishedGoods::find($id);
       
         
         $finishedgood->product_code=$request->product_code;
         $finishedgood->product_name=$request->product_name;
         $finishedgood->quantity=$request->quantity;
         $finishedgood->price=$request->price;
         $finishedgood->order_date="2024-04-06";
         $finishedgood->finished_good_status="nice";
         $finishedgood->batch_number=$request->batch_number;
        
         $finishedgood->save();


        return response()->json([
            'message' => 'finishedgoods update successfully'           
        ]);
    }

    public function destroy(string $id)
    {
          $finishedgood=FinishedGoods::find($id);  
        $finishedgood->delete();
          return json_encode(["message"=>"Successfully Deleted"]);
    }
}
