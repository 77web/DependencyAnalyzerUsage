<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


use PHPUnit\Framework\TestCase;

class MeijiTest extends TestCase
{
    public function test_supports()
    {
        $SUT = $this->getSUT();
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('1868-01-24')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('1868-01-25')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('1912-07-29')));
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('1912-07-31')));
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('2019-04-01')));
    }

    public function test_provide()
    {
        $SUT = $this->getSUT();

        $this->assertEquals('明治元年1月1日', $SUT->provide(new \DateTimeImmutable('1868-01-01')));
        $this->assertEquals('明治2年1月1日', $SUT->provide(new \DateTimeImmutable('1869-01-01')));
    }

    private function getSUT()
    {
        return new MinMax('明治', 18680125, 19120730);
    }
}
