<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


trait FormatDateTrait
{
    /**
     * @var string
     */
    private $name;

    public function formatDate(string $year, \DateTimeInterface $date)
    {
        return sprintf('%s%s年%s', $this->name, $year, $date->format('n月j日'));
    }
}
