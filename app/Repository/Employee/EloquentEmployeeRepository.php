<?php

namespace App\Repository\Employee;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;

class EloquentEmployeeRepository implements EmployeeRepository
{

    public function createEmployee(EmployeeRequest $request) {
       $employee = Employee::create([
           'name' => $request->name,
           'salary' => $request->salary
        ]);
        
       return $employee;
    }

}