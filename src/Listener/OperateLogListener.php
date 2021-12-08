<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Listener;

use Ezijing\HyperfAnnotatedLog\Event\OperateLogEvent;
use Ezijing\HyperfAnnotatedLog\Services\LogService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;
use Psr\Container\ContainerInterface;

/**
 * 操作日志监听器.
 *
 * @Listener
 */
#[Listener]
class OperateLogListener implements ListenerInterface
{
    /**
     * @Inject
     * @var LogService
     */
    protected $logService;

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function listen(): array
    {
        return [
            OperateLogEvent::class,
        ];
    }

    /**
     * @var OperateLogEvent
     */
    public function process(object $event)
    {
        $this->logService->write($event->operation, $event->desc);
    }
}
