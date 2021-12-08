<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Traits;

use Ezijing\HyperfAnnotatedLog\ConfigRegister;
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
}
