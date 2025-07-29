<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Employee\Employee;
use App\Models\Employee\EmployeeShift;
use App\Models\Employee\Employee_categorie;

class EmployeeController extends Controller
{
     
 
    public function index()
    {
          $employees=Employee::with("shift","categorie")->get();
        return response()->json(["employees"=>$employees]);
    }

  
    public function store(Request $request)
    {
         $employee=new Employee();

        $employee->employeeshift_id=$request->employeeshift_id;
        $employee->employee_categorie_id=$request->employee_categorie_id;
        $employee->joining_date=$request->joining_date;
        $employee->name=$request->name;
        $employee->father_name="N/A";
        $employee->mother_name="N/A";
        $employee->nid="1";
        $employee->gender="Male";
        $employee->dob="2002-07-06";
        $employee->photo=$request->photo;
        $employee->qualification="MBA";
        $employee->phone_number=$request->phone_number;
        $employee->email="N/A";
        $employee->address=$request->address;

        $employee->save();

         return response()->json([
            'message' => 'Employee saved successfully'           
        ]);
    }

    public function show(string $id)
    {
         $employee=Employee::with("shift","categorie")->findOrFail($id);        
            return response()->json(["employee"=>$employee]);
    }

    
    public function update(Request $request, string $id)
    {
          $employee=Employee::find($id);  

        $employee->employeeshift_id=$request->employeeshift_id;
        $employee->employee_categorie_id=$request->employee_categorie_id;
        $employee->joining_date=$request->joining_date;
        $employee->name=$request->name;
        $employee->father_name="N/A";
        $employee->mother_name="N/A";
        $employee->nid="1";
        $employee->gender="Male";
        $employee->dob="2002-07-06";
        $employee->photo=$request->photo;
        $employee->qualification="MBA";
        $employee->phone_number=$request->phone_number;
        $employee->email="N/A";
        $employee->address=$request->address;

        if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/employees'), $filename);
        $employee->photo = $filename;
    }

        $employee->save();

         return response()->json([
            'message' => 'Employee updated successfully'           
        ]);


    }

    
    public function destroy(string $id)
    {
        $employee=Employee::find($id);  
        $employee->delete();
          return json_encode(["message"=>"Successfully Deleted"]);
    }
}
