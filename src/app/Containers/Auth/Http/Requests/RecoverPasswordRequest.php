<?php

namespace App\Containers\Auth\Http\Requests;

use App\Core\Parents\Requests\ApiRequest;

class RecoverPasswordRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email'      => 'required|string|email|',
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
