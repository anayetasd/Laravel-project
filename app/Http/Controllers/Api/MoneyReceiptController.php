<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MR;
use App\Models\Product;
use App\Models\Company;
use App\Models\MoneyReceiptDetail;
use App\Models\Sales\Customer;


class MoneyReceiptController extends Controller
{
    
    public function index()
    {
        $mrs=MR::all();
        return response()->json(["mrs"=>$mrs]);
    }


    public function create()
        {
            return response()->json([
                'company' => Company::first(),
                'customers' => Customer::all(),
            
                'products' => Product::select('id', 'product_name')->get(),
                'last_id' => MR::max('id') ?? 0
            ]);
}


  
    public function store(Request $request)
    {
         $mr=new MR();
        $mr->customer_id=$request->customer_id;
        $mr->remark="na";
        $mr->receipt_total=$request->receipt_total;
        $mr->discount=$request->discount;
        $mr->vat="1";
        $mr->save();

          $items=$request->items;

          foreach($items as $item){
            $detail=new MoneyReceiptDetail();
            $detail->money_receipt_id=$mr->id;
            $detail->product_id=$item["product_id"];
            $detail->price=$item["price"];
            $detail->qty = $item['qty'] ?? 1;
            $detail->vat = $item['vat'] ?? 0;

            $detail->discount=$item["discount"];
               $detail->save();
          }

           return response()->json([
            "message" => "Money Receipt Saved Successfully",
            "mr_id"   => $mr->id
        ]);
    }

    public function show(string $id)
    {
        $mr=MR::find($id);
         return response()->json(["mr"=>$mr]);
    }

   
    public function update(Request $request,$id)
    {
         $mr=MR::find($id);
        $mr->customer_id=$request->customer_id;
        $mr->remark="na";
        $mr->receipt_total=$request->receipt_total;
        $mr->discount=$request->discount;
        $mr->vat="1";
        $mr->save();

        return response()->json([
            "message" => "Money Receipt Saved Successfully",
            "mr_id"   => $mr->id
        ]);

    }


        public function destroy(string $id)
    {
        $mr = MR::findOrFail($id); 
        $mr->delete();

        return response()->json(["message" => "Successfully Deleted"]);
    }

}
