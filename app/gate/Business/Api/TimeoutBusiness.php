<?php

namespace App\Gate\Business\Api;

use App\Gate\Business\Business;

class TimeoutBusiness extends Business
{
    public function handle(array $data)
    {
        $time = 3;
        sleep($time);
        return [
            'timeout' => $time
        ];
    }
}