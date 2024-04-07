<?php

namespace App\Http\Controllers;

use App\GoogleServicesController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $GSC;

    public function __construct()
    {
        $this->GSC = new GoogleServicesController();
    }
}
