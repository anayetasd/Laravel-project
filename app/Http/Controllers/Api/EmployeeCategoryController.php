<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee\Employee_categorie;


class EmployeeCategoryController extends Controller
{
    
    public function index()
    {
        $categories=Employee_categorie::all();
        return response()->json($categories);
    }

   
    public function store(Request $request)
    {
        
    }

    
    public function show(string $id)
    {
        
    }

  
    public function update(Request $request, string $id)
    {
        
    }

    
    public function destroy(string $id)
    {
        
    }
}
