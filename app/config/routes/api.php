<?php
// +----------------------------------------------------------------------
// | api.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
$router->add('/api/request', 'App\\Controllers\\Api\\Index::request');
$router->add('/api/timeout', 'App\\Controllers\\Api\\Index::timeout');
