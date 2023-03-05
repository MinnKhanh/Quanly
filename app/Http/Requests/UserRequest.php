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
}
