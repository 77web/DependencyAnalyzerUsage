<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


interface WarekiYearProviderInterface
{
    public function supports(\DateTimeInterface $date): bool;

    public function provide(\DateTimeInterface $date): string;
}
