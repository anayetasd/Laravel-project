<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Production\Production;
use App\Models\Inventory\RawMaterial;
use App\Models\Product;

use App\Libraries\Core\File;


class ProductionController extends Controller
{
    
    public function index()
    {   
        
        $productions=Production::with(['product', 'rawMaterial'])->paginate(10);
        return view("pages.production.index",["productions"=>$productions]);
    }

    
    public function create()
    {   
        $products=Product::all();
        $rawmaterials=RawMaterial::all();
        return view("pages.production.create",["products"=>$products, "rawmaterials"=>$rawmaterials]);
    }

   
    public function store(Request $request)
    {
        $production=new production();
        $production->production_date=$request->production_date;
        $production->product_id=$request->product_id;
        $production->raw_material_id=$request->raw_material_id;
        $production->quantity_produced=$request->quantity_produced;
        $production->unit=$request->unit;
        $production->production_cost=1;
        $production->created_at="2025-05-06";
        $production->name="Na";

        $production->save();


        return redirect("productions");

    }

    
    public function show($id)
    {
        $production=Production::find($id);
        return view("pages.production.show",["production"=>$production]);
    }


    public function edit( $id)
    {
        $production=Production::find($id);
        $products=Product::all();
        $rawmaterials=RawMaterial::all();
        return view("pages.production.edit",["production"=>$production, "products"=>$products, "rawmaterials"=>$rawmaterials]);
    }

   
    public function update(Request $request, production $production)
    {
        $production->production_date=$request->production_date;
        $production->product_id=$request->product_id;
        $production->raw_material_id=$request->raw_material_id;
        $production->quantity_produced=$request->quantity_produced;
        $production->unit=$request->unit;
        $production->production_cost=1;
        $production->created_at="2025-05-06";
        $production->name="Na";

        $production->update();


        return redirect("productions");
    }


        public function productionReport()
    {
        $productions = DB::table('productions')
            ->select('production_date',
                DB::raw("SUM(CASE WHEN product_id = 'rice' THEN quantity_produced ELSE 0 END) AS total_rice"),
                DB::raw("SUM(CASE WHEN product_id = 'broken' THEN quantity_produced ELSE 0 END) AS total_broken"),
                DB::raw("SUM(CASE WHEN product_id = 'husk' THEN quantity_produced ELSE 0 END) AS total_husk"),
                DB::raw("SUM(CASE WHEN product_id = 'bran' THEN quantity_produced ELSE 0 END) AS total_bran"),
                DB::raw("SUM(CASE WHEN raw_material_id IS NOT NULL THEN quantity_produced ELSE 0 END) AS total_paddy")
            )
            ->groupBy('production_date')
            ->orderBy('production_date', 'desc')
            ->get();

        return view('pages.production.report', compact('productions'));
    }


    function confirm($id){
        $production=Production::find($id);
        return view("pages.production.delete", ["production"=>$production]);
    }
   
    public function destroy(production $production)
    {
        $production->delete();

        return redirect("productions");

    }
}
