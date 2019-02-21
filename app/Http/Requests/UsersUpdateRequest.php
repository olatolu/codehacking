<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersUpdateRequest extends Request
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
            //

            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'min:6',
            'role_id' => 'required',
            'is_active' => 'required',
            'photo_id' => 'mimes:jpeg,png|max:3000'
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'role_id.required' => 'User Role is required.',
            'is_active.required'  => 'User status must be selected.',
            'photo_id.mimes' => 'The photo must be a file of type: jpeg, png.',
            'photo_id.max' => 'The photo id may not be greater than 3000 kilobytes'
        ];
    }
}