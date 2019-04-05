<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


trait WarekiYearTrait
{
    /**
     * @var int
     */
    private $minYmd;

    private function getWarekiYear(\DateTimeInterface $date): string
    {
        $startYear = intval($this->minYmd / 10000);
        if ($startYear === 0) {
            var_dump($date->format('Y-m-d'));
        }

        $year = (int)$date->format('Y') - $startYear + 1;
        if ($year === 1) {
            return '元';
        }

        return $year;
    }
}
