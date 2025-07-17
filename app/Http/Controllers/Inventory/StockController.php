<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Libraries\Core\File;

use App\Models\Inventory\Stock;
use App\Models\Purchases\Warehouse;
use App\Models\Product;
use App\Models\Transaction_type;

class StockController extends Controller
{
    
    public function index()
    {
         $stocks=Stock::with(['product', 'warehouse','transaction_type'])->paginate(10);
        return view("pages.Inventory.stock.index",["stocks"=>$stocks]);
    }

   
    public function create()
    {
        $products=Product::all();
        $warehouses=Warehouse::all();
        $transaction_types=Transaction_type::all();

        return view("pages.Inventory.stock.create",["products"=>$products, "warehouses"=>$warehouses, "transaction_types"=>$transaction_types]);
    }


    public function store(Request $request)
    {
    
        $stock=new stock();
        
        $stock->product_id=$request->product_id;
        $stock->qty=$request->qty;
        $stock->transaction_type_id=$request->transaction_type_id;
        $stock->remark="na";
        $stock->created_at=$request->created_at;
        $stock->warehouse_id=$request->warehouse_id;

        $stock->save();


        return redirect("stocks");

    }

   
    public function show( $id)
    {
        $stock=Stock::find($id);
          return view("pages.Inventory.stock.show",["stock"=>$stock]);
    }

    public function edit( $id)
    {
       

        $stock = Stock::findOrFail($id);
        $products = Product::all();
        $transaction_types = Transaction_type::all();
        $warehouses = Warehouse::all();

            return view('pages.Inventory.stock.edit',['stock'=>$stock, 'products'=>$products, 'transaction_types'=>$transaction_types, 'warehouses'=>$warehouses]);


    }

   
    public function update(Request $request, Stock $stock)
    {
         $stock->product_id=$request->product_id;
        $stock->qty=$request->qty;
        $stock->transaction_type_id=$request->transaction_type_id;
        $stock->remark="na";
        $stock->created_at=$request->created_at;
        $stock->warehouse_id=$request->warehouse_id;

        $stock->update();


        return redirect("stocks");
    }

    function confirm($id){
       $stock = Stock::with(['product', 'warehouse'])->findOrFail($id);
        return view('pages.Inventory.stock.confirm', ["stock"=>$stock]);
    }
   

    public function destroy(Stock $stock)
    {      
       
         $stock->delete();

        return redirect("stocks");

    }
}
