<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'config',
                    'description' => '发布注解路由配置.',
                    'source' => __DIR__ . '/../publish/annotation_log.php',
                    'destination' => BASE_PATH . '/config/autoload/annotation_log.php',
                ],
            ],
        ];
    }
}
