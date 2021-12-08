<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Annotations;

use Doctrine\Common\Annotations\Annotation\Target;
use Hyperf\Di\Annotation\AbstractAnnotation;

/**
 * 记录操作日志类.
 *
 * @Annotation
 * @Target({"METHOD"})
 */
class OperationLog extends AbstractAnnotation
{
    /**
     * 操作.
     * @var string
     */
    public $operation = '';

    /**
     * 描述.
     * @var string
     */
    public $desc = '';

    public function __construct($value = null)
    {
        parent::__construct($value);
        $this->bindMainProperty('operation', $value);
        $this->bindMainProperty('desc', $value);
    }
}
