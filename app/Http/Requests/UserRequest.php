<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'id_employee' => ['required'],
            'name' => ['required', 'string', 'min:1'],
            'email' => ['required', 'regex:/(.+)@(.+)\.(.+)/i',  'unique:users,email'],
            'role' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường :attribute không được để trống',
            'regex' => ':attribute không đúng định dạng',
            'date' => ':attribute không đúng định dạng',
            'numeric' => ':attribute không đúng định dạng',
            'role.numeric' => 'vui lòng chọn quyền',
            'same' => ':attribute không khớp',
            'string' => ':attribute phải là chuỗi',
            'file' => ':attribute không đúng định dạng',
            'unique' => ':attribute đã tồn tại',
            'min' => [
                'numeric' => 'vui lòng chọn :attribute',
                'string' => ':attribute tối thiểu :min kí tự',
            ],
        ];
    }
}
