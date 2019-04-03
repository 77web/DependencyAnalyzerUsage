<?php

namespace Quartetcom\TryDependencyAnalyzer;

use Quartetcom\TryDependencyAnalyzer\Wareki\WarekiProviderInterface;

class WarekiProviderResolver
{
    /**
     * @var WarekiProviderInterface[]
     */
    private $warekiProviders = [];

    public function addWarekiProvider(WarekiProviderInterface $warekiProvider)
    {
        $this->warekiProviders[] = $warekiProvider;

        return $this;
    }

    public function resolve(\DateTimeInterface $target)
    {
        foreach ($this->warekiProviders as $warekiProvider) {
            if ($warekiProvider->supports($target)) {
                return $warekiProvider;
            }
        }

        throw new \LogicException('No WarekiProvider defined');
    }
}
