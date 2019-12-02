<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class StoreUserFormRequest extends FormRequest
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
        $arrRules = [
            'name'  => 'required|string|max:225',
            'email' => 'required|unique:users,email',
            'password'  => 'required|min:8|max:30|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required|exists:roles,id',
        ];

        if (request()->method() == 'POST')
            return $arrRules;
        else if (request()->method() == 'PUT')
            $rules = array_merge($arrRules, ['email' => 'required|unique:users,email,'.$this->route('user'), 'password' => 'nullable|min:8|max:30|confirmed',
                'password_confirmation' => 'nullable']);
            return $rules;
    }
}
