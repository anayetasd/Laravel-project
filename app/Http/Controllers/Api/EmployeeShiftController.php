<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\EmployeeShift;

class EmployeeShiftController extends Controller
{
    
    public function index()
    {
       $shifts=EmployeeShift::all();
        return response()->json($shifts);
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
