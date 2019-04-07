<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;

/**
 * Class Min
 * @canOnlyUsedBy \Quartetcom\TryDependencyAnalyzer\WarekiApp
 * @package Quartetcom\TryDependencyAnalyzer\Wareki
 */
class Min implements WarekiYearProviderInterface
{
    use WarekiYearTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $minYmd;

    /**
     * @param string $name
     * @param int $startYmd
     */
    public function __construct(string $name, int $startYmd)
    {
        $this->name = $name;
        $this->minYmd = $startYmd;
    }

    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= $this->minYmd;
    }

    /**
     * @canOnlyUsedBy \Quartetcom\TryDependencyAnalyzer\WarekiApp
     * @param \DateTimeInterface $date
     * @return string
     */
    public function provide(\DateTimeInterface $date): string
    {
        return sprintf('%s%s', $this->name, $this->getWarekiYear($date));
    }
}
