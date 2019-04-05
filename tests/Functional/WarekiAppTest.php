<?php


namespace Quartetcom\TryDependencyAnalyzer\Functional;


use PHPUnit\Framework\TestCase;
use Quartetcom\TryDependencyAnalyzer\Wareki\Min;
use Quartetcom\TryDependencyAnalyzer\Wareki\MinMax;
use Quartetcom\TryDependencyAnalyzer\WarekiApp;
use Quartetcom\TryDependencyAnalyzer\WarekiYearProviderResolver;

class WarekiAppTest extends TestCase
{
    public function test()
    {
        $yearResolver = new WarekiYearProviderResolver();
        $yearResolver
            ->addWarekiYearProvider(new MinMax('明治', 18680125, 19120730))
            ->addWarekiYearProvider(new MinMax('大正', 19120730, 19251225))
            ->addWarekiYearProvider(new MinMax('昭和', 19251225, 19890107))
            ->addWarekiYearProvider(new MinMax('平成', 19890107, 20190501))
            ->addWarekiYearProvider(new Min('令和', 20190501))
        ;

        $SUT = new WarekiApp($yearResolver);
        $this->assertEquals('平成31年4月1日', $SUT->run('2019-04-01'));
        $this->assertEquals('令和元年5月1日', $SUT->run('2019-05-01'));
    }
}
