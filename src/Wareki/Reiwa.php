<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class Reiwa implements WarekiProviderInterface
{
    use WarekiYearTrait;
    use FormatDateTrait;

    public function __construct()
    {
        $this->startYear = 2019;
        $this->name = '令和';
    }

    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= 20190501;
    }

    public function provide(\DateTimeInterface $date): string
    {
        return $this->formatDate($this->getWarekiYear($date), $date);
    }
}
