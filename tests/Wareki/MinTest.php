<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


use PHPUnit\Framework\TestCase;

class MinTest extends TestCase
{
    public function test_supports()
    {
        $SUT = new Min('dummy', 20190401);

        $this->assertFalse($SUT->supports(new \DateTimeImmutable('2019-03-31')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('2019-04-01')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('2020-05-01')));
    }

    public function test_provide()
    {
        $SUT = new Min('dummy', 20190401);

        $this->assertEquals('dummy元年4月1日', $SUT->provide(new \DateTimeImmutable('2019-04-01')));
        $this->assertEquals('dummy2年4月1日', $SUT->provide(new \DateTimeImmutable('2020-04-01')));
    }
}
