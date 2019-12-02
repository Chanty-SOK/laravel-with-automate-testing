<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserFormRequest extends FormRequest
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
            'name'                  => 'required|string|max:225',
            'email'                 => 'required|unique:users,email,'.$this->route('user'),
            'password'              => 'nullable|min:8|max:30|confirmed',
            'password_confirmation' => 'nullable',
            'role' => 'required|exists:roles,id',
        ];
    }
}
