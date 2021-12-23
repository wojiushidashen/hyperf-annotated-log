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
        var_dump('test');
    }

    public function testFindCityByIp()
    {
        $city = getRegion('172.16.51.166');
        var_dump($city);
    }
}
