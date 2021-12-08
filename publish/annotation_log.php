<?php

return [
    // 配置操作者的ID
    // 登录用户信息存储在 Context下
    'user' => [
        'key' => 'user', // context的key
        'id' => 'id', // 用户的id
    ],
    // 指定的模型
    'models' => [
        'log' => Ezijing\HyperfAnnotatedLog\Models\Log::class,
    ],
    // 指定的表明
    'table_names' => [
        'log' => 's_logs',
    ],
];
