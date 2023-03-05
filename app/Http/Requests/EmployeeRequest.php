<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'position' => ['required', 'numeric', 'min:1'],
            'department' => ['required', 'numeric', 'min:1'],
            'date_entered'  => ['required', 'date'],
            'img' => request('isedit') ? '' : 'required|file|mimes:jpeg,jpg,png,gif',
        ];
    }
}
