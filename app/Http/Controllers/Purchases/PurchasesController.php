<?php

namespace App\Http\Controllers\Purchases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Purchases\PurchaseDetail;
use App\Models\Purchases\Purchase;
use App\Models\Purchases\Supplier;
use App\Libraries\Core\File;



class PurchasesController extends Controller
{
   function index(){                      
        
        $purchases=Purchase::with("supplier")->paginate(8);
        return view("pages.purchases.purchase.index",["purchases"=>$purchases]);
    }

    function create(){
        $suppliers=Supplier::all();
        return view("pages.purchases.purchase.create",["suppliers"=>$suppliers]);
    }

    function store(Request $request){    
      
        $purchase=new purchase();
        $purchase->id=$request->id;
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
         
        $purchase->save();

       
        return redirect("purchases");
    }

    public function show($id)
    {
        $purchase = Purchase::with(['details', 'supplier'])->findOrFail($id);

        return view('pages.purchases.purchase.show', compact('purchase'));
    }

      
    function edit($id){
        $purchase=purchase::find($id);  
        $suppliers=Supplier::all();
        return view("pages.purchases.purchase.edit",["purchase"=>$purchase, "suppliers"=>$suppliers]);
    }

    public function update(Request $request, $id){       
       
          $purchase = Purchase::findOrFail($id);

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
          
    
        $purchase->save();

       

        return redirect("purchases");
    }


 

    public function due()
    {
        
        $suppliers = Supplier::with('purchases')->get();

       
        $data = $suppliers->map(function ($supplier) {
            $totalPurchase = $supplier->purchases->sum('purchase_total');
            $totalPaid     = $supplier->purchases->sum('paid_amount');
            $totalDue      = $totalPurchase - $totalPaid;

            return [
                'name'           => $supplier->name,
                'total_purchase' => $totalPurchase,
                'total_paid'     => $totalPaid,
                'total_due'      => $totalDue,
            ];
        });

        return view('pages.purchases.purchase.due', compact('data'));
    }



    function confirm($id){
       $purchase=purchase::find($id);  
        
       return view("pages.purchases.purchase.confirm",["purchase"=>$purchase]);
    }
    function destroy(purchase $purchase){      
      $purchase->delete();
      return redirect("purchases");
    }

}
