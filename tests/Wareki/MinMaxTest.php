<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


use PHPUnit\Framework\TestCase;

class MinMaxTest extends TestCase
{
    public function test_supports()
    {
        $SUT = new MinMax('dummy', 20190401, 20200501);

        $this->assertFalse($SUT->supports(new \DateTimeImmutable('2019-03-31')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('2019-04-01')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('2019-04-02')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('2019-04-30')));
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('2020-05-01')));
    }

    public function test_provide()
    {
        $SUT = new MinMax('dummy', 20190401, 20190501);

        $this->assertEquals('dummy元', $SUT->provide(new \DateTimeImmutable('2019-04-01')));
        $this->assertEquals('dummy2', $SUT->provide(new \DateTimeImmutable('2020-04-01')));
    }
}
