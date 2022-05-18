<?php

namespace App\Http\Requests;

use App\Rules\SettingKeyRule;
use App\Rules\SettingValueRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'key' => [
                'string', 
                'required', 
                new SettingKeyRule
            ],
            'value' => [
                'numeric',
                'required',
                new SettingValueRule
            ],
        ];
    }

    public function messages()
    {
        return [
          'key.required' => 'Key wajib diisi.',
          'value.required' => 'Value wajib diisi.',
        ];
    }
}
