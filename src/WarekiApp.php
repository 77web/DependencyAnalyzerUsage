<?php


namespace Quartetcom\TryDependencyAnalyzer;


class WarekiApp
{
    /**
     * @var WarekiProviderResolver
     */
    private $warekiProviderResolver;

    /**
     * @param WarekiProviderResolver $warekiProviderResolver
     */
    public function __construct(WarekiProviderResolver $warekiProviderResolver)
    {
        $this->warekiProviderResolver = $warekiProviderResolver;
    }

    public function run(string $date)
    {
        $targetDate = new \DateTimeImmutable($date);

        return $this->warekiProviderResolver->resolve($targetDate)->provide($targetDate);
    }
}
