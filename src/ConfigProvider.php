<?php

declare(strict_types=1);
/**
 * This file is part of Sett.
 *
 * @link     https://www.Sett.io
 * @document https://doc.Sett.io
 * @contact  group@Sett.io
 * @license  https://github.com/Sett/Sett/blob/master/LICENSE
 */
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
                ]
            ],
        ];
    }
}
