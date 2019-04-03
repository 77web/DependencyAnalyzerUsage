<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


interface WarekiProviderInterface
{
    public function supports(\DateTimeInterface $date): bool;

    public function provide(\DateTimeInterface $date): string;
}
