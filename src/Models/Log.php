<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Models;

use Ezijing\HyperfAnnotatedLog\Traits\HasLogs;
use Hyperf\Database\Model\Events\Creating;
use Hyperf\Database\Model\Model;
use Hyperf\Snowflake\IdGeneratorInterface;
use Hyperf\Utils\ApplicationContext;

class Log extends Model
{
    use HasLogs;

    public $attributes = [
        'desc' => '',
    ];

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(config('annotation_log.table_names.log'));
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
