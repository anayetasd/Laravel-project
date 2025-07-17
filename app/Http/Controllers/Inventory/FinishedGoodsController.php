<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Libraries\Core\File;
use App\Models\Inventory\FinishedGoods;


class FinishedGoodsController extends Controller
{
    
    public function index()
    {
        $finishedGoods=DB::table("finished_goods")->get();
       return view("pages.Inventory.finishedGoods.index",["finishedGoods"=>$finishedGoods]);
    }

    
    public function create()
    {
         return view("pages.Inventory.finishedGoods.create");
    }

    public function store(Request $request)
    {
        $finishedGood=new FinishedGood();
        $finishedGood->product_code=1;
        $finishedGood->product_name=$request->product_name;
        $finishedGood->quantity=$request->quantity;
        $finishedGood->price=$request->price;
        $finishedGood->order_date=$request->order_date;
        $finishedGood->finished_good_status=$request->price_per_unit;
        $finishedGood->batch_number=1;
 
        $finishedGood->save();


          return redirect("finishedGoods");
    }

   
    public function show(string $id)
    {
    $finishedGood=FinishedGoods::find($id);
    return view("pages.Inventory.finishedGoods.show",["finishedGood"=>$finishedGood]);
    }

    
    public function edit(string $id)
    {
         $finishedGood=FinishedGoods::find($id);
        return view("pages.Inventory.finishedGoods.edit",["finishedGood"=>$finishedGood]);
    }

    
    public function update(Request $request, finishedGood $finishedGood)
    {
         $finishedGood->product_code=1;
        $finishedGood->product_name=$request->product_name;
        $finishedGood->quantity=$request->quantity;
        $finishedGood->price=$request->price;
        $finishedGood->order_date=$request->order_date;
        $finishedGood->finished_good_status=$request->price_per_unit;
        $finishedGood->batch_number=1;
 
        $finishedGood->update();


        return redirect("finishedGoods");
    }


    
    public function confirm($id){
        $finishedGood=FinishedGoods::find($id);
    return view("pages.Inventory.finishedGoods.confirm",["finishedGood"=>$finishedGood]);
    }

    
    public function destroy( finishedGood $finishedGood)
    {
         $finishedGood->delete();
        return redirect("finishedGoods");
    }
}
