<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee\Employee_administrator;
// use App\Models\Employee\Employee_festival_bonuse;
use App\Models\Employee\Employeee;
use App\Models\Employee\Payment_method;

class Employee_salary extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

   public function administrator(){
    return $this->belongsTo(Employee_salary::class, 'employee_administrator_id');
   }
//    public function bonuse(){
//     return $this->hasmany(Employee_festival_bonuse::class, 'employee_festival_bonuse_id');
//    }
    public function payment()
    {
        return $this->belongsTo(Payment_Method::class, 'payment_method_id');
    }
}
