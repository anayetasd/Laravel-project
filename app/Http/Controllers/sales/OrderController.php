<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Libraries\Core\File;

use App\Models\Sales\Order;
use App\Models\Sales\OrderDetail;
use App\Models\Sales\Customer;


class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::with('customer')->paginate(8);
        return view("pages.sales.order.index",["orders"=>$orders]);
    }

   
    public function create()
    {

        $customers=Customer::all();
     return view("pages.sales.order.create", ["customers" => $customers]);
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
        $order->remark=$request->remark;
        $order->status_id=1;
        $order->discount=$request->discount;
        $order->vat=1;
      

        $order->save();
     
        return redirect("orders");
    }

    public function show($id)
    {
        $order = Order::with('orderDetails.product')->findOrFail($id);
        return view("pages.sales.order.show",["order"=>$order]);
    }

    public function edit($id)
    {
        $order=Order::find($id);
        $customers=Customer::all();

        return view("pages.sales.order.edit",["order"=>$order, "customers"=>$customers]);
    }

  
    public function update(Request $request, Order $order)
    {
             

        $order->customer_id=$request->customer_id;
       $order->order_date=$request->order_date;
        $order->delivery_date=$request->delivery_date;
        $order->shipping_address=$request->shipping_address;
        $order->order_total=$request->order_total;
        $order->paid_amount=$request->paid_amount;
        $order->remark="Na";
        $order->status_id=1; 
        $order->discount=$request->discount;
        $order->vat=0;
        $order->save();

        return redirect("orders");

    }

    public function confirm($id){
        $order=Order::find($id);
        return view("pages.sales.order.confirm",["order"=>$order]);
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect("orders");
    }
}
