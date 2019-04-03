<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class Showa implements WarekiProviderInterface
{
    use WarekiYearTrait;
    use FormatDateTrait;

    public function __construct()
    {
        $this->startYear = 1926;
        $this->name = '昭和';
    }

    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= 19261225 && $ymd < 19890107;
    }

    public function provide(\DateTimeInterface $date): string
    {
        return $this->formatDate($this->getWarekiYear($date), $date);
    }
}
