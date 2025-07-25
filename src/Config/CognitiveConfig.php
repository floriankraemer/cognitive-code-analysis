<?php

declare(strict_types=1);

namespace Phauthentic\CognitiveCodeAnalysis\Config;

use InvalidArgumentException;

/**
 * @SuppressWarnings(BooleanArgumentFlag)
 */
class CognitiveConfig
{
    /**
     * @param array<string> $excludeFilePatterns
     * @param array<string> $excludePatterns
     * @param array<int|string, MetricsConfig> $metrics
     */
    public function __construct(
        public readonly array $excludeFilePatterns,
        public readonly array $excludePatterns,
        public readonly array $metrics,
        public readonly bool $showOnlyMethodsExceedingThreshold,
        public readonly float $scoreThreshold,
        public readonly bool $showHalsteadComplexity = false,
        public readonly bool $showCyclomaticComplexity = false,
    ) {
    }
}
