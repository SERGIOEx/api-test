<?php

namespace App\Containers\Auth\Http\Requests;

use App\Core\Parents\Requests\ApiRequest;

class SignUpRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:30',
            'last_name'  => 'required|max:30',
            'email'      => 'required|string|email|unique:users',
            'password'   => 'required|string|min:6',
            'phone'      => 'required',
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
