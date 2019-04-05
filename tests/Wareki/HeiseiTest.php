<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


use PHPUnit\Framework\TestCase;

class HeiseiTest extends TestCase
{
    public function test_supports()
    {
        $SUT = $this->getSUT();
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('1989-01-06')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('1989-01-07')));
        $this->assertTrue($SUT->supports(new \DateTimeImmutable('2019-04-30')));
        $this->assertFalse($SUT->supports(new \DateTimeImmutable('2019-05-01')));
    }

    public function test_provide()
    {
        $SUT = $this->getSUT();

        $this->assertEquals('平成元', $SUT->provide(new \DateTimeImmutable('1989-01-07')));
        $this->assertEquals('平成2', $SUT->provide(new \DateTimeImmutable('1990-01-01')));
    }

    private function getSUT()
    {
        return new MinMax('平成', 19890107, 20190501);
    }
}
