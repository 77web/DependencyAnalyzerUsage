<?php


namespace Quartetcom\TryDependencyAnalyzer;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;
use Quartetcom\TryDependencyAnalyzer\Wareki\WarekiProviderInterface;

class WarekiAppTest extends TestCase
{
    /**
     * @var WarekiProviderResolver|ObjectProphecy
     */
    private $resolverProphecy;

    public function setUp()
    {
        $this->resolverProphecy = $this->prophesize(WarekiProviderResolver::class);
    }

    public function test_run()
    {
        $provider = $this->prophesize(WarekiProviderInterface::class);
        $provider->provide(Argument::that(function(\DateTimeInterface $date){
            return $date->format('Y-m-d') === '2019-04-01';
        }))->shouldBeCalled();
        $this->resolverProphecy->resolve(Argument::type(\DateTimeInterface::class))->willReturn($provider->reveal())->shouldBeCalled();

        $app = $this->getSUT();
        $app->run('2019-04-01');
    }

    private function getSUT()
    {
        /** @var WarekiProviderResolver $resolver */
        $resolver = $this->resolverProphecy->reveal();

        return new WarekiApp($resolver);
    }
}
