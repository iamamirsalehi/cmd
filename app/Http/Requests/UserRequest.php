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
            'userFullName'          => 'required|min:3|max:255',
            'userEmail'             => 'required|email',
            'userRole'              => 'required|numeric',
            'password'          => 'required|confirmed|min:3',
        ];
    }
}
