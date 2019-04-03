<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class Taisho implements WarekiProviderInterface
{
    use WarekiYearTrait;

    public function __construct()
    {
        $this->startYear = 1912;
    }

    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= 19120730 && $ymd < 19261225;
    }

    public function provide(\DateTimeInterface $date): string
    {
        $year = $this->getWarekiYear($date);

        return sprintf('大正%s年%s', $year, $date->format('n月j日'));
    }

}
