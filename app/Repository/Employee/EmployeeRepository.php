<?php

namespace App\Repository\Employee;

use App\Http\Requests\EmployeeRequest;

interface EmployeeRepository
{
    public function createEmployee(EmployeeRequest $request);
}