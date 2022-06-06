<?php

namespace App\Core\Parents\Controllers;


use App\Core\Parents\Traits\ResponseTrait;
use Nwidart\Modules\Routing\Controller;


/**
 * Class ApiController.
 *
 */
abstract class ApiController extends Controller
{

    use ResponseTrait;

    /**
     * The type of this controller. This will be accessible mirrored in the Actions.
     * Giving each Action the ability to modify it's internal business logic based on the UI type that called it.
     *
     * @var  string
     */
    public string $ui = 'api';
}
