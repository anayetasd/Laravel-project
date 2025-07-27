<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\Employee_administrator;

class EmployeeAdministratorController extends Controller
{
   
    public function index()
    {
        $administrator=Employee_administrator::get();
        return response()->json($administrator);
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
