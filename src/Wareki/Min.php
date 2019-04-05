<?php


namespace Quartetcom\TryDependencyAnalyzer\Wareki;


class Min implements WarekiProviderInterface
{
    use WarekiYearTrait;
    use FormatDateTrait;

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

    public function provide(\DateTimeInterface $date): string
    {
        return $this->formatDate($this->getWarekiYear($date), $date);
    }
}
