<?php
/**
 * 分模块路由配置
 */

return [
    'front_url' => env('FRONT_URL', '192.168.0.234'),//前端
    'back_url' => env('BACK_URL', '192.168.0.234'), //后台管理
    'api_url' => env('API_URL', '192.168.0.234'),//Api
    'web_url' => env('WEB_URL', '192.168.0.234'),//公共
];