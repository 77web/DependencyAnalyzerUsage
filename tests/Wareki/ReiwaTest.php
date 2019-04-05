<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


use PHPUnit\Framework\TestCase;

class ReiwaTest extends TestCase
{
    public function test_supports()
    {
        $SUT = $this->getSUT();
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('2019-04-30')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('2019-05-01')));
    }

    public function test_provide()
    {
        $SUT = $this->getSUT();

        $this->assertEquals('令和元年5月1日', $SUT->provide(new \DateTimeImmutable('2019-05-01')));
        $this->assertEquals('令和2年1月1日', $SUT->provide(new \DateTimeImmutable('2020-01-01')));
    }

    private function getSUT()
    {
        return new Min('令和', 20190501);
    }
}
