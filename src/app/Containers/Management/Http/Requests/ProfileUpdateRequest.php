<?php

namespace App\Containers\Management\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname'  => 'required|min:3',
            'email'     => ['required', Rule::unique('users')->ignore($this->user()->id)],
            'role_id'   => 'required',
            'status'    => 'required',
            'phone'     => 'required',
            'time_step' => 'numeric|max:60|min:10',
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
