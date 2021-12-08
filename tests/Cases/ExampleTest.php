<?php

declare(strict_types=1);
/**
 * This file is part of Sett.
 *
 * @link     https://www.Sett.io
 * @document https://doc.Sett.io
 * @contact  group@Sett.io
 * @license  https://github.com/Sett/Sett/blob/master/LICENSE
 */
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
