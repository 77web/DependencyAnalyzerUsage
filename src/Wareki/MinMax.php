<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class MinMax implements WarekiProviderInterface
{
    use FormatDateTrait;
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
     * @var int
     */
    private $maxYmd;

    /**
     * @param string $name
     * @param int $minYmd
     * @param int $maxYmd
     */
    public function __construct(string $name, int $minYmd, int $maxYmd)
    {
        $this->name = $name;
        $this->minYmd = $minYmd;
        $this->maxYmd = $maxYmd;
    }

    public function supports(\DateTimeInterface $date): bool
    {
        $ymd = $date->format('Ymd');

        return $ymd >= $this->minYmd && $ymd < $this->maxYmd;
    }

    public function provide(\DateTimeInterface $date): string
    {
        return $this->formatDate($this->getWarekiYear($date), $date);
    }
}
