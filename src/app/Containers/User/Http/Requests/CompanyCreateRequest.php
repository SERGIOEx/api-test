<?php

namespace App\Containers\User\Http\Requests;

use App\Core\Parents\Requests\ApiRequest;

class CompanyCreateRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'       => 'required|string|max:50|min:5',
            'phone'       => 'required|string|min:14|max:20',
            'description' => 'nullable|max:200'
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
