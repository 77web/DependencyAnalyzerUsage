<?php


namespace Quartetcom\TryDependencyAnalyzer;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Quartetcom\TryDependencyAnalyzer\Wareki\WarekiYearProviderInterface;

class WarekiAppTest extends TestCase
{
    /**
     * @var WarekiYearProviderResolver|ObjectProphecy
     */
    private $resolverProphecy;

    public function setUp()
    {
        $this->resolverProphecy = $this->prophesize(WarekiYearProviderResolver::class);
    }

    public function test_run()
    {
        $provider = $this->prophesize(WarekiYearProviderInterface::class);
        $provider->provide(Argument::that(function(\DateTimeInterface $date){
            return $date->format('Y-m-d') === '2019-04-01';
        }))->willReturn('dummy1')->shouldBeCalled();
        $this->resolverProphecy->resolve(Argument::type(\DateTimeInterface::class))->willReturn($provider->reveal())->shouldBeCalled();

        $app = $this->getSUT();
        $this->assertEquals('dummy1年4月1日', $app->run('2019-04-01'));
    }

    private function getSUT()
    {
        /** @var WarekiYearProviderResolver $resolver */
        $resolver = $this->resolverProphecy->reveal();

        return new WarekiApp($resolver);
    }
}
