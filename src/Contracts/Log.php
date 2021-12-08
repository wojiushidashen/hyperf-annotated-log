<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Contracts;

interface Log
{
    /**
     * 写日志.
     *
     * @param string $operation 操作说明
     * @param string $desc 操作详情
     */
    public function write(string $operation, string $desc = ''): bool;
}
