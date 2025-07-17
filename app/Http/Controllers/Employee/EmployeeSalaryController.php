<?php

namespace App\Http\Controllers\Employee;

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
        $employeesalarys=Employee_salary::with(["payment","employee","administrator"])->paginate(8);
        return view("pages.Employee_salary.index",["employeesalarys"=>$employeesalarys]);
    }

     public function create()
    {
        $payments= Payment_method::all();
        $employees=Employee::all();
        $administrators=Employee_administrator::all();
        return view("pages.Employee_salary.create", ["payments"=>$payments, "employees"=>$employees, "administrators"=>$administrators]);
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

       

        return redirect("employeesalarys");
       
       
    }

     public function show($id)
    {
         $employeesalary=Employee_salary::find($id);        
        return view("pages.Employee_salary.show",["employeesalary"=>$employeesalary]);
    }

   
    public function edit($id)
    {
      
        $employeesalary = Employee_salary::findOrFail($id);      
       
        $payments= Payment_method::all();
        $employees=Employee::all();
        $administrators=Employee_administrator::all();

    return view('pages.Employee_salary.edit', compact('employeesalary', 'payments', 'employees','administrators'));
    }


  
    public function update(Request $request,$id)
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

       

        return redirect("employeesalarys");
       
    }

   function confirm($id){
       $employeesalary = Employee_salary::find($id);      
        return view("pages.Employee_salary.confirm", ["employeesalary"=>$employeesalary]);
    }
    function destroy(EmployeeSalary $employeesalary){
        $employeesalary->delete();
        return redirect("employeesalarys");
    }
}
