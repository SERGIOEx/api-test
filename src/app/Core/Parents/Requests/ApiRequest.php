<?php

namespace App\Core\Parents\Requests;

use App\Core\Core\Requests\Request as AbstractRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class Request
 *
 */
abstract class ApiRequest extends AbstractRequest
{

    use RequestCastsTrait;

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = new JsonResponse(['data' => [
            'status'   => 'error',
            'messages' => $validator->errors()
        ]], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }

    /**
     * Overriding this function to modify the any user input before
     * applying the validation rules.
     *
     * @param null $keys
     *
     * @return  array
     */
    public function all($keys = null)
    {
        $requestData = parent::all($keys);
        return $this->casts($requestData);
    }

}

