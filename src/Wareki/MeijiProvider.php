<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class MeijiProvider implements WarekiProviderInterface
{
    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= 18680125 && $ymd <= 19120730;
    }

    public function provide(\DateTimeInterface $date): string
    {
        $year = (int)$date->format('Y') - 1867;
        if ($year === 1) {
            $year = '元';
        }

        return sprintf('明治%s年%s', $year, $date->format('n月j日'));
    }

}
