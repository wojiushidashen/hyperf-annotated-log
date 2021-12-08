<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Services;

use Ezijing\HyperfAnnotatedLog\Contracts\Log;
use Hyperf\Di\Annotation\Inject;

class LogService implements Log
{
    /**
     * @Inject
     * @var \Ezijing\HyperfAnnotatedLog\Models\Log
     */
    protected $logModel;

    /**
     * 写日志.
     */
    public function write(string $operation, string $desc = ''): bool
    {
        $this->logModel->create([
            'operate' => $operation,
            'desc' => $desc,
        ]);

        return true;
    }
}
