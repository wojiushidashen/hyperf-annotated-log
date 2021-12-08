<?php

declare(strict_types=1);

namespace Ezijing\HyperfAnnotatedLog\Models;

use Ezijing\HyperfAnnotatedLog\Traits\HasLogs;
use Hyperf\Database\Model\Model;

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
}
