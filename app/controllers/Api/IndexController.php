<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Gate\Business\Api\RequestBusiness;
use App\Gate\Request\Api\RequestRequest;
use App\Gate\Response\Api\RequestResponse;
use App\Gate\Validator\Api\RequestValidator;

class IndexController extends Controller
{

    public function requestAction()
    {
        return $this->execute(new RequestRequest(), new RequestValidator(), new RequestBusiness(), new RequestResponse());
    }

}

