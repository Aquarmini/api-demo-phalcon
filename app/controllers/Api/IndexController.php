<?php

namespace App\Controllers\Api;

use App\Controllers\Controller;
use App\Gate\Business\Api\RequestBusiness;
use App\Gate\Business\Api\TimeoutBusiness;
use App\Gate\Request\Api\RequestRequest;
use App\Gate\Request\Api\TimeoutRequest;
use App\Gate\Response\Api\RequestResponse;
use App\Gate\Response\Api\TimeoutResponse;
use App\Gate\Validator\Api\RequestValidator;
use App\Gate\Validator\Api\TimeoutValidator;

class IndexController extends Controller
{

    public function requestAction()
    {
        return $this->execute(new RequestRequest(), new RequestValidator(), new RequestBusiness(), new RequestResponse());
    }

    public function timeoutAction()
    {
        return $this->execute(new TimeoutRequest(), new TimeoutValidator(), new TimeoutBusiness(), new TimeoutResponse());
    }

}

