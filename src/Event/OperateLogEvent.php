<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Event;

/**
 * 操作日志事件.
 *
 * Class OperateLogEvent
 */
class OperateLogEvent
{
    /**
     * 操作信息.
     * @var string
     */
    public $operation = '';

    /**
     * 操作详情描述.
     * @var string
     */
    public $desc = '';

    public function __construct($operation, $desc = '')
    {
        $this->operation = $operation;
        $this->desc = $desc;
    }
}
