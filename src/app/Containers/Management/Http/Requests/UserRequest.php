<?php

namespace App\Containers\Management\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname'  => 'required|min:3|max:35',
            'password'  => 'required|min:6|max:10',
            'email'     => 'required|min:3|max:35|email|unique:users,email',
            'role'      => 'required|numeric',
            'avatar'    => 'mimes:jpg,png,jpeg',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
