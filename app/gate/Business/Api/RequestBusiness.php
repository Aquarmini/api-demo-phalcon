<?php

namespace App\Gate\Business\Api;

use App\Gate\Business\Business;
use App\Utils\Debug;

class RequestBusiness extends Business
{
    public function handle(array $data)
    {
        $data = $this->request->get();
        $header = $this->request->getHeaders();
        $json = $this->request->getJsonRawBody();
        $method = $this->request->getMethod();

        $res = [
            'header' => $header,
            'body' => $data,
            'json' => $json,
            'method' => $method,
            'ip' => Debug::ip()
        ];

        return $res;
    }
}
