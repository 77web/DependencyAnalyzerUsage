<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class Meiji implements WarekiProviderInterface
{
    use WarekiYearTrait;

    public function __construct()
    {
        $this->startYear = 1868;
    }

    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= 18680125 && $ymd <= 19120730;
    }

    public function provide(\DateTimeInterface $date): string
    {
        $year = $this->getWarekiYear($date);

        return sprintf('明治%s年%s', $year, $date->format('n月j日'));
    }

}
