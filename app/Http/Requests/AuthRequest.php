<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'regex:/(.+)@(.+)\.(.+)/i'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường :attribute không được để trống',
            'regex' => ':attribute không đúng định dạng',
            'same' => ':attribute không khớp',
            'string' => ':attribute phải là chuỗi',
            'min' => [
                'string' => ':attribute tối thiểu :min kí tự',
            ],
        ];
    }
}
