<?php

namespace App\Containers\User\Http\Requests;

use App\Core\Parents\Requests\ApiRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:3|max:35',
            'last_name'  => 'required|min:3|max:35',
            'password'   => 'nullable|min:6',
            //'email'      => ['required', Rule::unique('users')->ignore($this->user()->id)]
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
