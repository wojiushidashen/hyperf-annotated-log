<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Traits;

use Ezijing\HyperfAnnotatedLog\ConfigRegister;
use Hyperf\Database\Model\Events\Creating;
use Hyperf\Snowflake\IdGeneratorInterface;
use Hyperf\Utils\ApplicationContext;
use Hyperf\Utils\Context;

trait HasLogs
{
    private $logClass;

    public function getLogClass()
    {
        if (! isset($this->logClass)) {
            $this->logClass = ApplicationContext::getContainer()->get(ConfigRegister::class)->getLogClass();
        }

        return $this->logClass;
    }

    public static function getUsers()
    {
        return Context::get('annotation_log.user.key', []);
    }

    public function creating(Creating $event)
    {
        // 使用雪花算法生成ID
        if (! $this->getKey()) {
            $container = ApplicationContext::getContainer();
            $generator = $container->get(IdGeneratorInterface::class);
            $this->{$this->getKeyName()} = $generator->generate();
        }

        /* @var self $model */
        $model = ApplicationContext::getContainer()->get($this->getLogClass());
        $model->setAttribute('operator', self::getUsers()[config('annotation_log.user.id')] ?? '');
        $model->setAttribute('ip', getHttpClientIp());
    }
}
