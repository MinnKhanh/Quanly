<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1'],
            'email' => ['required', 'regex:/(.+)@(.+)\.(.+)/i', request('isedit') ? '' : 'unique:users,email'],
            'home_town' => ['required', 'string', 'min:1'],
            'birth_day' => ['required', 'date'],
            'gender' => ['required', 'numeric'],
            'phone' => ['required', 'string', 'min:9'],
            'cmtnd' => ['required', 'string', 'min:9'],
            'bank_name' => ['required'],
            'bank_number' => ['required'],
            'img' => request('isedit') ? '' : 'required|file|mimes:jpeg,jpg,png,gif',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường :attribute không được để trống',
            'regex' => ':attribute không đúng định dạng',
            'date' => ':attribute không đúng định dạng',
            'numeric' => ':attribute không đúng định dạng',
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
