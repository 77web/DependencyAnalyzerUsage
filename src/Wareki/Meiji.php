<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class Meiji implements WarekiProviderInterface
{
    use WarekiYearTrait;
    use FormatDateTrait;

    public function __construct()
    {
        $this->name = '明治';
        $this->startYear = 1868;
    }

    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= 18680125 && $ymd < 19120730;
    }

    public function provide(\DateTimeInterface $date): string
    {
        return $this->formatDate($this->getWarekiYear($date), $date);
    }
}
