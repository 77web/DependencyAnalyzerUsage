<?php


namespace Quartetcom\TryDependencyAnalyzer;


use Quartetcom\TryDependencyAnalyzer\Wareki\Min;

class WrongUsageWarekiApp
{
    public function run()
    {
        $reiwa = new Min('令和', 20190501);
        $reiwa->provide(new \DateTimeImmutable('2019-04-01')); // wrong usage
    }
}
