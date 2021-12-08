<?php
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
     *
     * @param string $operation
     * @param string $desc
     * @return bool
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
