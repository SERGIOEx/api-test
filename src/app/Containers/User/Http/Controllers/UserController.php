<?php

namespace App\Containers\User\Http\Controllers;

use App\Containers\User\Tasks\GetCompaniesListTask;
use App\Containers\User\Transformers\CompanyTransformer;
use App\Core\Parents\Controllers\ApiController;

final class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function getCompanyList(): array
    {
        $data = GetCompaniesListTask::run();
        return $this->transform($data, CompanyTransformer::class);
    }
}
