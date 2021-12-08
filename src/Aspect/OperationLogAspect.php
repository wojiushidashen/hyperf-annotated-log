<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Aspect;

use Ezijing\HyperfAnnotatedLog\Annotations\OperationLog;
use Ezijing\HyperfAnnotatedLog\Event\OperateLogEvent;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use Hyperf\Utils\Codec\Json;
use Psr\Container\ContainerInterface;

/**
 * @Aspect
 */
#[Aspect]
class OperationLogAspect extends AbstractAspect
{
    public $annotations = [
        OperationLog::class,
    ];

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $result = $proceedingJoinPoint->process();
        /* @var OperationLog $operationLog */
        $operationLog = $proceedingJoinPoint->getAnnotationMetadata()->method[OperationLog::class];
        $data['desc'] = $operationLog->desc;
        if ($operationLog->desc == '') {
            $data['desc'] = $operationLog->operation;
        }

        $request = getHttpRequest();
        $ip = getHttpClientIp();
        $data = array_merge($data, [
            'router' => getRoutePath(),
            'uri' => $request->getRequestUri(),
            'ip' => $ip,
            'request_data' => $request->all(),
            'response_data' => $result,
        ]);

        getEventDispatcherFactory()->dispatch(new OperateLogEvent($operationLog->operation, Json::encode($data)));

        return $result;
    }
}
