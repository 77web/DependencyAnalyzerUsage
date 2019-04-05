<?php


namespace Quartetcom\TryDependencyAnalyzer\Functional\Wareki;

use Quartetcom\TryDependencyAnalyzer\Wareki\MinMax;
use PHPUnit\Framework\TestCase;

class TaishoTest extends TestCase
{
    public function test_supports()
    {
        $SUT = $this->getSUT();
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('1912-07-29')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('1912-07-30')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('1926-12-24')));
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('1926-12-25')));
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('2019-04-01')));
    }

    public function test_provide()
    {
        $SUT = $this->getSUT();

        $this->assertEquals('大正元', $SUT->provide(new \DateTimeImmutable('1912-07-30')));
        $this->assertEquals('大正2', $SUT->provide(new \DateTimeImmutable('1913-01-01')));
    }

    private function getSUT()
    {
        return new MinMax('大正', 19120730, 19261225);
    }
}
