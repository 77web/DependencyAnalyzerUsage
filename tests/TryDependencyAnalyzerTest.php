<?php

declare(strict_types=1);

namespace Quartetcom\TryDependencyAnalyzer;

use PHPUnit\Framework\TestCase;

class TryDependencyAnalyzerTest extends TestCase
{
    /**
     * @var TryDependencyAnalyzer
     */
    protected $tryDependencyAnalyzer;

    protected function setUp() : void
    {
        $this->tryDependencyAnalyzer = new TryDependencyAnalyzer;
    }

    public function testIsInstanceOfTryDependencyAnalyzer() : void
    {
        $actual = $this->tryDependencyAnalyzer;
        $this->assertInstanceOf(TryDependencyAnalyzer::class, $actual);
    }
}
