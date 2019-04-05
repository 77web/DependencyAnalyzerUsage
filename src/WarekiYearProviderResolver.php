<?php

namespace Quartetcom\TryDependencyAnalyzer;

use Quartetcom\TryDependencyAnalyzer\Wareki\WarekiYearProviderInterface;

class WarekiYearProviderResolver
{
    /**
     * @var WarekiYearProviderInterface[]
     */
    private $warekiYearProvider = [];

    public function addWarekiYearProvider(WarekiYearProviderInterface $warekiProvider)
    {
        $this->warekiYearProvider[] = $warekiProvider;

        return $this;
    }

    public function resolve(\DateTimeInterface $target)
    {
        foreach ($this->warekiYearProvider as $warekiProvider) {
            if ($warekiProvider->supports($target)) {
                return $warekiProvider;
            }
        }

        throw new \LogicException('No WarekiYearProvider defined');
    }
}
