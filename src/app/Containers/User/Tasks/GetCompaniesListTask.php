<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Entities\Company;

final class GetCompaniesListTask
{
    /**
     * TODO: need add FilterParams class [limit, search by title, phone, etc.]
     */
    public static function run()
    {
        return Company::paginate(10);
    }
}
