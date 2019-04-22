<?php


namespace Quartetcom\TryDependencyAnalyzer;


use Quartetcom\TryDependencyAnalyzer\Wareki\Min;

class WrongUsageApp
{
    public function run()
    {
        $targetDate = new \DateTimeImmutable('2018-04-30');
        $reiwa = new Min('令和', 20190501);

        return $reiwa->provide($targetDate);
    }
}
