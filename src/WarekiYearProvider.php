<?php


namespace Quartetcom\TryDependencyAnalyzer;


class WarekiYearProvider
{
    /**
     * @var WarekiYearProviderResolver
     */
    private $warekiYearProviderResolver;

    /**
     * @param WarekiYearProviderResolver $warekiYearProviderResolver
     */
    public function __construct(WarekiYearProviderResolver $warekiYearProviderResolver)
    {
        $this->warekiYearProviderResolver = $warekiYearProviderResolver;
    }

    public function provide(\DateTimeInterface $targetDate)
    {
        return $this->warekiYearProviderResolver->resolve($targetDate)->provide($targetDate);
    }
}
