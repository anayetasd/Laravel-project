<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales\OrderDetail;


class OrderDetailController extends Controller
{
    
    public function index()
    {
        $details=OrderDetail::all();
        return response()->json(["details"=>$details]);
    }

   
    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
         $details=new OrderDetail();
            $details->order_id=$order->id;
            $details->product_id=$item["product_id"];
            $details->qty=$item["qty"];
            $details->price=$item["price"];
            $details->vat = $item["vat"] ?? 0;
            $details->discount=$item["discount"];
            $details->save();


             $data=[   
            "id"=>$order->id,          
            "msg"=>"Success"
        ];

         return response()->json($data);
    }

    public function show(string $id)
    {
        $detail = OrderDetail::findOrFail($id);

        return response()->json([
            'detail' => $detail
        ]);
    }

   
    public function edit(string $id)
    {
        
    }

    
    public function update(Request $request, string $id)
    {
        $detail=OrderDetail::find($id); 

        $details->order_id=$order->id;
            $details->product_id=$item["product_id"];
            $details->qty=$item["qty"];
            $details->price=$item["price"];
            $details->vat = $item["vat"] ?? 0;
            $details->discount=$item["discount"];
            $details->save();


             $data=[   
            "id"=>$order->id,          
            "msg"=>"Success"
        ];

         return response()->json($data);
    }

    
    public function destroy(string $id)
    {       
        $detail=OrderDetail::find($id); 
          $detail->delete();
          return json_encode(["message"=>"Successfully Deleted"]);
    }
}
