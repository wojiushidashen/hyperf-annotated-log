<?php

declare(strict_types=1);

namespace HyperfTest\Cases;

/**
 * @internal
 * @coversNothing
 */
class ExampleTest extends AbstractTestCase
{
    public function testExample()
    {
        var_dump(config('table_names', 'dsds'));
    }
}
