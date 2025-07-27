<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee\Employee;

use App\Models\Employee\Employee_administrator;

use App\Models\Employee\Payment_method;
use App\Models\Employee\Employee_salary;

class EmployeeSalaryController extends Controller
{
    
    public function index()
    {
          $employeesalarys=Employee_salary::with("administrator","payment")->get();
        return response()->json(["employeesalarys"=>$employeesalarys]);
    }

 
    public function store(Request $request)
    {
          $employeesalary=new Employee_salary();

        $employeesalary->employee_id="82051";
        $employeesalary->name=$request->name;
        $employeesalary->payment_date=$request->payment_date;
        $employeesalary->employee_administrator_id=$request->employee_administrator_id;
        $employeesalary->employee_festival_bonuse_id=null;
        $employeesalary->payment_method_id=$request->payment_method_id;
        $employeesalary->reference = $request->reference ?: null;
        $employeesalary->total_amount=$request->total_amount;
        $employeesalary->total_deductions="1";
        $employeesalary->net_salary=1;
        $employeesalary->paid_amount=$request->paid_amount;
        
       
        $employeesalary->save();

         return response()->json([
            'message' => 'Employeesalary saved successfully'           
        ]);

    }

   
    public function show(string $id)
    {
          $employeesalary=Employee_salary::with("administrator","payment")->findOrFail($id);        
            return response()->json(["employeesalary"=>$employeesalary]);
    }

    
    public function update(Request $request, string $id)
    {
         $employeesalary=Employee_salary::find($id);    

         $employeesalary->employee_id="82051";
        $employeesalary->name=$request->name;
        $employeesalary->payment_date=$request->payment_date;
        $employeesalary->employee_administrator_id=$request->employee_administrator_id;
        $employeesalary->employee_festival_bonuse_id=null;
        $employeesalary->payment_method_id=$request->payment_method_id;
        $employeesalary->reference = $request->reference ?: null;
        $employeesalary->total_amount=$request->total_amount;
        $employeesalary->total_deductions="1";
        $employeesalary->net_salary=1;
        $employeesalary->paid_amount=$request->paid_amount;
        
       
        $employeesalary->save();

         return response()->json([
            'message' => 'Employeesalary updated successfully'           
        ]);



    }

    
    public function destroy(string $id)
    {
         $employeesalary=Employee_salary::find($id);  
        $employeesalary->delete();
          return json_encode(["message"=>"Successfully Deleted"]);
    }
}
