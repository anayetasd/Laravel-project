<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Purchases\Purchase;
use App\Models\Purchases\PurchaseDetail;
use App\Models\Inventory\Stock;
use App\Models\Purchases\Supplier;
use App\Models\Purchases\Warehouse;
use App\Models\Product;
use App\Libraries\Core\File;


class PurchasesController extends Controller
{
   
    public function index()
    {
        $purchases=Purchase::with("supplier")->get();
        return response()->json(["purchases"=>$purchases]);
    }


    public function store(Request $request)
    {
        
        $purchase=new purchase();
       
        $purchase->supplier_id=$request->supplier_id;
        $purchase->purchase_date=$request->purchase_date;
        $purchase->delivery_date="2025-08-06";
        $purchase->shipping_address=$request->shipping_address; 
        $purchase->purchase_total=$request->purchase_total;
        $purchase->paid_amount=$request->paid_amount;
        $purchase->remark=1;
        $purchase->status_id="294394";
        $purchase->discount=$request->discount;
        $purchase->vat=1;
        $purchase->created_at="2015-04-08";
        $purchase->updated_at="2015-04-08";        
        $purchase->save();


        $items=$request->items;

          foreach($items as $item){
            $details=new PurchaseDetail();
            $details->purchase_id=$purchase->id;
            $details->product_id=$item["product_id"];
            $details->qty=$item["qty"];
            $details->price=$item["price"];
            $details->vat = $item["vat"] ?? 0;
            $details->discount=$item["discount"];
            $details->save();

            $stock=new Stock();
            $stock->product_id=$item["product_id"];
            $stock->transaction_type_id=4;
            $stock->qty=$item["qty"];       
            $stock->remark="Purchase";  
            $stock->warehouse_id=1;  
            //$stock->timestamps = false;
            $stock->save();

          }


           $data=[   
            "id"=>$purchase->id,          
            "msg"=>"Success"
        ];

         return response()->json($data);
      
    }

    public function show($id)
    {
        $purchase = Purchase::with(['supplier', 'details.product'])->findOrFail($id);

        return response()->json([
            'purchase' => $purchase
        ]);
    }

  
        
    

    public function update(Request $request, $id)
    {
          $purchase=Purchase::find($id);
       
        $purchase->supplier_id=$request->supplier_id;
        $purchase->purchase_date=$request->purchase_date;
        $purchase->delivery_date="2025-08-06";
        $purchase->shipping_address=$request->shipping_address; 
        $purchase->purchase_total=$request->purchase_total;
        $purchase->paid_amount=$request->paid_amount;
        $purchase->remark=1;
        $purchase->status_id="294394";
        $purchase->discount=$request->discount;
        $purchase->vat=1;
        $purchase->created_at="2015-04-08";
        $purchase->updated_at="2015-04-08";        
        $purchase->save();

      
         return response()->json([
            'message' => 'Purchases updated successfully'           
        ]);


    }
    
     
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return response()->json(['message' => 'Successfully Deleted']);
    }


}
