<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Services;

use Ezijing\HyperfAnnotatedLog\Contracts\Log;
use Hyperf\Di\Annotation\Inject;

class LogService implements Log
{
    /**
     * @var \Ezijing\HyperfAnnotatedLog\Models\Log
     */
    protected $logModel;

    public function __construct()
    {
        $this->logModel = make(config('annotation_log.models.log'));
    }

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
