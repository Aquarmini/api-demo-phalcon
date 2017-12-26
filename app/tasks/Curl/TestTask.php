<?php

namespace App\Tasks\Curl;

use App\Common\Enums\ErrorCode;
use App\Common\Exceptions\CodeException;
use App\Tasks\Task;
use App\Utils\Curl;
use Xin\Cli\Color;

class TestTask extends Task
{

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  Curl测试脚本') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run curl:test@[action]', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  info         curl_getinfo测试', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  timeout      timeout测试', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function infoAction()
    {
        $url = 'http://api.demo.phalcon.lmx0536.cn/api/request';
        $params = [
            'key' => 'hello world',
            'name' => 'limx',
        ];

        $res = static::json($url, $params);
        dd($res);
    }

    public function timeoutAction()
    {
        $url = 'http://api.demo.phalcon.lmx0536.cn/api/timeout';
        $params = [
            'key' => 'hello world',
            'name' => 'limx',
        ];

        $res = static::json($url, $params);
        dd($res);
    }

    public static function json($url, $params)
    {
        $body = json_encode($params);

        $ch = curl_init();
        // 设置抓取的url
        curl_setopt($ch, CURLOPT_URL, $url);
        // 启用时会将头文件的信息作为数据流输出。
        curl_setopt($ch, CURLOPT_HEADER, false);
        // 启用时将获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 启用时会将服务器服务器返回的"Location: "放在header中递归的返回给服务器，使用CURLOPT_MAXREDIRS可以限定递归返回的数量。
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        // 设置访问 方法
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // 设置POST BODY
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        // 设置JSON HEADER
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($body),
        ]);

        //执行命令
        $result = curl_exec($ch);
        if ($result === false) {
            $msg = 'Curl error: ' . curl_error($ch);
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_CURL_ERROR, $msg);
        }

        $info = curl_getinfo($ch);

        //关闭URL请求
        curl_close($ch);
        $res = json_decode($result, true);

        return [$res, $info];
    }

}

