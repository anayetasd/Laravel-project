<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    
    public function index()
    {
        $company=Company::first();
        return response()->json($company);
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
