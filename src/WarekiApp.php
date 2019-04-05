<?php


namespace Quartetcom\TryDependencyAnalyzer;


class WarekiApp
{
    /**
     * @var WarekiYearProviderResolver
     */
    private $warekiYearProviderResolver;

    /**
     * @param WarekiYearProviderResolver $warekiProviderResolver
     */
    public function __construct(WarekiYearProviderResolver $warekiProviderResolver)
    {
        $this->warekiYearProviderResolver = $warekiProviderResolver;
    }

    public function run(string $date)
    {
        $targetDate = new \DateTimeImmutable($date);

        return sprintf('%s年%s', $this->warekiYearProviderResolver->resolve($targetDate)->provide($targetDate), $targetDate->format('n月j日'));
    }
}
