<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Sales\Customer;
use App\Models\Product;
use App\Models\Company;
use App\Models\MR;
use App\Models\MoneyReceiptDetail;

class MoneyReceiptController extends Controller
{
    
   public function index()
    {
        $mrs=MR::with('customer')->paginate(10);
        return view("pages.MR.index",["mrs"=>$mrs ]);
    }

   public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        $company = Company::find(1);
        $MR_last = MR::max('id');

        return view("pages.MR.create", compact("customers", "products", "company", "MR_last"));
    }


   
    public function store(Request $request)
    {
          $$mr=new MR();
        $mr->customer_id=$request->customer_id;
        $mr->remark="Sales";
        $mr->receipt_total=$request->receipt_total;
        $mr->discount=$request->discount;
        $mr->vat=1;
        $mr->save();

        return redirect("mrs");
       
        
    }

   
    public function show( $id)
    {
        $mr = MR::with(['mrDetails', 'customer'])->findOrFail($id);

        return view('pages.MR.show', compact('mr'));
    }

   
    public function edit( $id)
    {
        $mr=MR::find($id);  
        $customers=Customer::all();
        return view("pages.MR.edit",["mr"=>$mr, "customers"=>$customers]);
    }

   
    public function update(Request $request, $id)
    {
        $mr= MR::findOrFail($id);

        $mr->customer_id=$request->customer_id;
        $mr->remark="sales";
        $mr->receipt_total=$request->receipt_total;
        $mr->discount=$request->discount;
        $mr->vat="1";
        $mr->save();

        return redirect("mrs");

    }

    
    function confirm($id){
       $mr=MR::find($id);  
        
       return view("pages.MR.confirm",["mr"=>$mr]);
    }
    function destroy(MR $mr){      
      $mr->delete();
      return redirect("mrs");
    }
}