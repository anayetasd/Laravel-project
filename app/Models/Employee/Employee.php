<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee\EmployeeShift;
use App\Models\Employee\Employee_categorie;

class Employee extends Model
{
    public function shift(){
        return $this->belongsTo(EmployeeShift::class, 'employeeshift_id');
    }
    public function categorie(){
        return $this->belongsTo(Employee_categorie::class, 'employee_categorie_id');
    }

}
