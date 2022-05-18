<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{  
    public function rules()
    {
        return [
            'name' => [
                'string', 
                'required',
                'min:2',
                'unique:employees'
            ],
            'salary' => [
                'integer',
                'between:2000000,10000000', 
            ],
        ];
    }

    public function messages()
    {
        return [
          'name.string' => 'Name harus berupa string..',
          'name.required' => 'Name wajib diisi..',
          'name.min:2' => 'Name minimal 2 karakter..',
          'name.unique:employees' => 'Name sudah ada sebelumnya..',
          'salary.integer' => 'Salary harus berupa bilangan bulat..',
          'salary.between:2000000,10000000' => 'Salary Minimal 2.000.000 Maximal 10.000.000',
        ];
    }
}
