<?php


namespace Quartetcom\TryDependencyAnalyzer;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

class WarekiAppTest extends TestCase
{
    /**
     * @var WarekiYearProvider|ObjectProphecy
     */
    private $providerProphecy;

    public function setUp()
    {
        $this->providerProphecy = $this->prophesize(WarekiYearProvider::class);
    }

    public function test_run()
    {
        $this->providerProphecy->provide(Argument::type(\DateTimeInterface::class))->willReturn('dummy1')->shouldBeCalled();

        $app = $this->getSUT();
        $this->assertEquals('dummy1年4月1日', $app->run('2019-04-01'));
    }

    private function getSUT()
    {
        /** @var WarekiYearProvider $provider */
        $provider = $this->providerProphecy->reveal();

        return new WarekiApp($provider);
    }
}
