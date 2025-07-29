<?php

namespace App\Http\Controllers\Employee;

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
        $employees=Employee::with(["shift","categorie"])->paginate(8);
        return view("pages.Employee.index",["employees"=>$employees]);
    }

    
    public function create()
    {
        $shifts= EmployeeShift::all();
        $categories=Employee_categorie::all();
        return view("pages.Employee.create", ["shifts"=>$shifts, "categories"=>$categories]);
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

        if($request->hasFile('photo')){
            //upload file
			$imageName=$employee->id.'.'.$request->photo->extension();			
			$request->photo->move(public_path('img'),$imageName);

            
            $employee->photo=$imageName;
			$employee->save();
		}

        return redirect("employees");
       
       
    }

     public function show($id)
    {
         $employee=Employee::find($id);        
        return view("pages.Employee.show",["employee"=>$employee]);
    }

   
    public function edit($id)
    {
      
        $employee = Employee::findOrFail($id);      
        $shifts = EmployeeShift::all();
        $categories = Employee_categorie::all();

    return view('pages.Employee.edit', compact('employee', 'shifts', 'categories'));
    }


  
    public function update(Request $request, $id)
{
    // পুরানো রেকর্ড আনা
    $employee = Employee::findOrFail($id);

    // নতুন ডাটা গুলো সেট করা
    $employee->employeeshift_id = $request->employeeshift_id;
    $employee->employee_categorie_id = $request->employee_categorie_id;
    $employee->joining_date = $request->joining_date;
    $employee->name = $request->name;
    $employee->father_name = "N/A";
    $employee->mother_name = "N/A";
    $employee->nid = "1";
    $employee->gender = "Male";
    $employee->dob = "2002-07-06";
    $employee->qualification = "MBA";
    $employee->phone_number = $request->phone_number;
    $employee->email = "N/A";
    $employee->address = $request->address;

  
    if ($request->hasFile('photo')) {
      
        if ($employee->photo && file_exists(public_path('img/' . $employee->photo))) {
            unlink(public_path('img/' . $employee->photo));
        }
        $file = $request->file('photo');
        $imageName = time() . '.' . $file->extension();
        $file->move(public_path('img'), $imageName);

        $employee->photo = $imageName;
    }


    $employee->save();

    return redirect('employees')->with('success', 'Employee Updated Successfully');
}


   function confirm($id){
        $employee=Employee::find($id);
        return view("pages.Employee.confirm", ["employee"=>$employee]);
    }
    function destroy(Employee $employee){
        $employee->delete();
        return redirect("employees");
    }

}
