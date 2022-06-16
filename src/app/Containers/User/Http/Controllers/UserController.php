<?php

namespace App\Containers\User\Http\Controllers;

use App\Containers\User\Http\Dto\BaseCompanyParameters;
use App\Containers\User\Http\Requests\CompanyCreateRequest;
use App\Containers\User\Tasks\CompanyCreateTask;
use App\Containers\User\Tasks\GetCompaniesListTask;
use App\Containers\User\Transformers\CompanyTransformer;
use App\Core\Parents\Controllers\ApiController;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

final class UserController extends ApiController
{

    /**
     * @throws UnknownProperties
     */
    public function createCompany(CompanyCreateRequest $request): \Illuminate\Http\JsonResponse
    {
        $parameters = new BaseCompanyParameters($request->all());
        $parameters->author_id = auth()->id();

        CompanyCreateTask::run($parameters);

        return $this->created('Company created');
    }

    /**
     * Display a listing of the resource.
     */
    public function getCompanyList(): array
    {
        $data = GetCompaniesListTask::run();
        return $this->transform($data, CompanyTransformer::class);
    }
}
