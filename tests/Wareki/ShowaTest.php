<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


use PHPUnit\Framework\TestCase;

class ShowaTest extends TestCase
{
    public function test_supports()
    {
        $SUT = $this->getSUT();
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('1926-12-24')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('1926-12-25')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('1989-01-06')));
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('1989-01-07')));
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('2019-04-01')));
    }

    public function test_provide()
    {
        $SUT = $this->getSUT();

        $this->assertEquals('昭和元年12月26日', $SUT->provide(new \DateTimeImmutable('1926-12-26')));
        $this->assertEquals('昭和2年1月1日', $SUT->provide(new \DateTimeImmutable('1927-01-01')));
    }

    private function getSUT()
    {
        return new Showa();
    }
}
