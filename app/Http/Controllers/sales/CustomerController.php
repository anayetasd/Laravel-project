<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Libraries\Core\File;

use App\Models\Sales\Customer;

class CustomerController extends Controller
{
   
    public function index()
    {
       $customers=DB::table("customers")->get();
       return view("pages.sales.customer.index",["customers"=>$customers]);
    }

    public function create()
    {
        return view("pages.sales.customer.create");
    }

    public function store(Request $request)
    {
        $customer=new customer();
        $customer->name=$request->name;
        $customer->mobile=$request->mobile;
        $customer->email=$request->email;
        $customer->created_at="2024-01-12";
        $customer->updated_at="2025-01-10";
        $customer->address=$request->address;
        // $customer->photo=$request->photo;

        $customer->save();

        if($request->hasFile('photo')){
            $imageName=$customer->id.'.'.$request->photo->extension();
            $request->photo->move(public_path('img'),$imageName);
            $customer->photo=$imageName;
            $customer->update();
        }

        return redirect("customers");
    }

    public function show($id)
    {
        $customer=Customer::find($id);
        return view("pages.sales.customer.show",["customer"=>$customer]);

    }

    public function edit($id)
    {
        $customer=Customer::find($id);
        return view("pages.sales.customer.edit",["customer"=>$customer]);
    }


    public function update(Request $request, customer $customer)
    {
       
        $customer->name=$request->name;
        $customer->mobile=$request->mobile;
        $customer->email=$request->email;
        $customer->created_at="2024-01-12";
        $customer->updated_at="2025-01-10";
        $customer->address=$request->address;
        // $customer->photo=$request->photo;

        $customer->update();

         if($request->hasFile('photo')){
            $imageName=$customer->id.'.'.$request->photo->extension();
            $request->photo->move(public_path('img'),$imageName);
            $customer->photo=$imageName;
            $customer->update();
        }

        return redirect("customers");

    }

    public function confirm($id){
        $customer=Customer::find($id);
        return view("pages.sales.customer.confirm",["customer"=>$customer]);
    }

    public function destroy(customer $customer)
    {
        $customer->delete();
        return redirect("customers");
    }
}
