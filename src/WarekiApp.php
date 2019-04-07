<?php


namespace Quartetcom\TryDependencyAnalyzer;


class WarekiApp
{
    /**
     * @var WarekiYearProvider
     */
    private $warekiYearProvider;

    /**
     * @param WarekiYearProvider $warekiYearProvider
     */
    public function __construct(WarekiYearProvider $warekiYearProvider)
    {
        $this->warekiYearProvider = $warekiYearProvider;
    }

    public function run(string $date)
    {
        $targetDate = new \DateTimeImmutable($date);

        return sprintf('%s年%s', $this->warekiYearProvider->provide($targetDate), $targetDate->format('n月j日'));
    }
}
