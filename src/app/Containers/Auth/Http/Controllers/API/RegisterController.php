<?php

namespace App\Containers\Auth\Http\Controllers\API;

use App\Core\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class RegisterController extends ApiController
{


    public function __invoke(): JsonResponse
    {
        return $this->created('User created!');
    }

}
