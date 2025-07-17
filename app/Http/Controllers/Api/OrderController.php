<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request; 

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Sales\Order;
use App\Models\Sales\OrderDetail;
use App\Models\Sales\Customer;
use App\Models\Inventory\Stock;
use App\Libraries\Core\File;


class OrderController extends Controller
{
   
    public function index()
    {
         $orders=Order::all();
        return response()->json(["orders"=>$orders]);
    }


    
    public function store(Request $request)
    {
        
        $order=new Order();
       
        $order->customer_id=$request->customer_id;
        $order->order_date=$request->order_date;
        $order->delivery_date=$request->delivery_date;
        $order->shipping_address=$request->shipping_address; 
        $order->order_total=$request->order_total;
        $order->paid_amount=$request->paid_amount;
        $order->remark=1;
        $order->status_id="294394";
        $order->discount=$request->discount;
        $order->vat=1;
               
        $order->save();


        $items=$request->items;

          foreach($items as $item){
            $details=new OrderDetail();
            $details->order_id=$order->id;
            $details->product_id=$item["product_id"];
            $details->qty=$item["qty"];
            $details->price=$item["price"];
            $details->vat = $item["vat"] ?? 0;
            $details->discount=$item["discount"];
            $details->save();

            $stock=new Stock();
            $stock->product_id=$item["product_id"];
            $stock->transaction_type_id=1;
            $stock->qty -=$item["qty"];       
            $stock->remark="Sales";  
            $stock->warehouse_id=1;  
            //$stock->timestamps = false;
            $stock->save();

          }


           $data=[   
            "id"=>$order->id,          
            "msg"=>"Success"
        ];

         return response()->json($data);
      
    }

    
    public function show($id)
    {
        $order = Order::with(['customer', 'orderDetails.product'])->findOrFail($id);

        return response()->json([
            'order' => $order
        ]);
    }


   
    public function update(Request $request, string $id)
    {
        $orders=Order::find($id); 

        $order->customer_id=$request->customer_id;
        $order->order_date=$request->order_date;
        $order->delivery_date=$request->delivery_date;
        $order->shipping_address=$request->shipping_address; 
        $order->order_total=$request->order_total;
        $order->paid_amount=$request->paid_amount;
        $order->remark=1;
        $order->status_id="294394";
        $order->discount=$request->discount;
        $order->vat=1;
               
        $order->save();
    }

 
    public function destroy($id)
    {
         $order=Order::find($id);  
        $order->delete();
          return json_encode(["message"=>"Successfully Deleted"]);
    }
}
