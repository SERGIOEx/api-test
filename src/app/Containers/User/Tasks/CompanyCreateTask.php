<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Entities\Company;
use App\Containers\User\Http\Dto\BaseCompanyParameters;

final class CompanyCreateTask
{
    public static function run(BaseCompanyParameters $parameters)
    {
        return Company::create($parameters->toArray());
    }
}
