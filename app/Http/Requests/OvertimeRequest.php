<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OvertimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'employee_id' => [
                'integer', 
                'required', 
            ],
            'date' => [
                'date',
                'required'
            ],
            'time_started' => [
                'required',
                'date_format:H:i',
                'before_or_equal:time_ended', 
            ],
            'time_ended' => [
                'required',
                'date_format:H:i',
                'after_or_equal:time_started', 
            ]
        ];
    }

    public function messages()
    {
        return [
          'employee_id.integer' => 'Employee Id harus berupa integer..', 
          'employee_id.required' => 'Employee Id wajib diisi..', 
          'date.date' => 'Date tidak cocok dengan format yyyy-mm-dd..', 
          'date.required' => 'Date wajib diisi..', 
          'time_started.required' => 'Time started wajib diisi..', 
          'time_started.date_format' => 'Time started tidak cocok dengan format H:i', 
          'time_started.before_or_equal' => 'Time started Tidak boleh lebih dari `time_ended`',  
          'time_ended.required' => 'Time Ended wajib diisi..', 
          'time_ended.date_format' => 'Time Ended tidak cocok dengan format H:i', 
          'time_ended.after_or_equal' => 'Time Ended Tidak boleh kurang dari `time_started`',  
        ];
    }
}
