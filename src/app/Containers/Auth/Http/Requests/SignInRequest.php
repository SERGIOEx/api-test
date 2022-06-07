<?php

namespace App\Containers\Auth\Http\Requests;

use App\Core\Parents\Requests\ApiRequest;
use JetBrains\PhpStorm\ArrayShape;

class SignInRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email'    => 'required|string|email|',
            'password' => 'required|string|min:6'
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
