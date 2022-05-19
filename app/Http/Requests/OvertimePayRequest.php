<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OvertimePayRequest extends FormRequest
{
    public function rules()
    {
        return [
            'month' => [ 
                "required",
                'date_format:Y-m', 
            ]
        ];
    }

    public function messages()
    {
        return [
          'month.date_format' => 'Month Tidak Sesuai',  
        ];
    }
}
