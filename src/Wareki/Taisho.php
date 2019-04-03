<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class Taisho implements WarekiProviderInterface
{
    use WarekiYearTrait;
    use FormatDateTrait;

    public function __construct()
    {
        $this->startYear = 1912;
        $this->name = '大正';
    }

    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= 19120730 && $ymd < 19261225;
    }

    public function provide(\DateTimeInterface $date): string
    {
        return $this->formatDate($this->getWarekiYear($date), $date);
    }
}
