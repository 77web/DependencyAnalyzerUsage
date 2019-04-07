<?php


namespace Quartetcom\TryDependencyAnalyzer;


use PHPUnit\Framework\TestCase;
use Quartetcom\TryDependencyAnalyzer\Wareki\WarekiYearProviderInterface;

class WarekiYearProviderTest extends TestCase
{
    public function test()
    {
        $date = new \DateTimeImmutable('2019-04-01');

        $provider = $this->prophesize(WarekiYearProviderInterface::class);
        $provider->provide($date)->willReturn('dummy1')->shouldBeCalled();
        $resolver = $this->prophesize(WarekiYearProviderResolver::class);
        $resolver->resolve($date)->willReturn($provider->reveal())->shouldBeCalled();

        $SUT = new WarekiYearProvider($resolver->reveal());
        $this->assertEquals('dummy1', $SUT->provide($date));
    }
}
