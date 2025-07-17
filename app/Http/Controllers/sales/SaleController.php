<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\pagination\paginator;
use App\Models\Sales\Sale;
use App\Models\Sales\Customer;
use App\Libraries\core\File;
use App\Models\SalesDetails;


class SaleController extends Controller
{
    
    public function index()
    {
        // $sales=DB::table("sales")->get();

        $sales=Sale::with('customer')->get();
       // print_r ("$sales" );
        return view("pages.sales.sale.index",["sales"=>$sales]);
    }

   
    public function create()
    {
          $customers=Customer::all();
        return view("pages.sales.sale.create", ["customers"=>$customers]);
    }

    public function store(Request $request)
    {
        

        $sale=new Sale();
        $sale->id=$request->id;
        $sale->customer_id=$request->customer_id;
        $sale->total_amount=$request->total_amount;
        $sale->discount=$request->discount;
        $sale->status=$request->status;
        $sale->created_at=$request->created_at;
        $sale->save();

        return redirect("sales");
    }

    public function show($id)
    {
        $sale=Sale::find($id);
        return view("pages.sales.sale.show",["sale"=>$sale]);
    }

   
    public function edit($id)
    {
           $sale=Sale::find($id);
           $customers=Customer::all();
        return view("pages.sales.sale.edit",["sale"=>$sale,"customers"=>$customers]);

    }

   
    public function update(request $request, sale $sale)
    {
        $sale->id=$request->id;
        $sale->customer_id=$request->customer_id;
        $sale->total_amount=$request->total_amount;
        $sale->discount=$request->discount;
        $sale->status=$request->status;
        $sale->created_at=$request->created_at;
        $sale->update();

        return redirect("sales");
    }

     public function confirm($id){
        $sale=Sale::find($id);
        return view("pages.sales.sale.confirm",["sale"=>$sale]);
    }
    
    public function destroy(sale $sale)
    {
        $sale->delete();
        return redirect("sales");
    }
}
