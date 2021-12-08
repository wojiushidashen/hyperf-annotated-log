<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog;

use Psr\Container\ContainerInterface;

class ConfigRegister
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    protected $logClass;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        $this->logClass = config('annotation_log.models.log');
    }

    public function getLogClass()
    {
        return $this->container->get($this->logClass);
    }
}
