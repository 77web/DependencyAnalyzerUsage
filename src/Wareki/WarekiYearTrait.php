<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


trait WarekiYearTrait
{
    /**
     * @var int
     */
    private $startYear;

    private function getWarekiYear(\DateTimeInterface $date): string
    {
        $year = (int)$date->format('Y') - $this->startYear + 1;
        if ($year === 1) {
            return '元';
        }

        return $year;
    }
}
