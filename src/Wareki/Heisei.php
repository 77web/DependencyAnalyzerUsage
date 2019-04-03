<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class Heisei implements WarekiProviderInterface
{
    use WarekiYearTrait;
    use FormatDateTrait;

    public function __construct()
    {
        $this->startYear = 1989;
        $this->name = '平成';
    }

    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= 19890107 && $ymd < 20190501;
    }

    /**
     * @canOnlyUsedBy \Quartetcom\TryDependencyAnalyzer\WarekiProviderResolver
     * @param \DateTimeInterface $date
     * @return string
     */
    public function provide(\DateTimeInterface $date): string
    {
        return $this->formatDate($this->getWarekiYear($date), $date);
    }
}
