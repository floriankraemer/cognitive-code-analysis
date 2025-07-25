<?php

declare(strict_types=1);

namespace Phauthentic\CognitiveCodeAnalysis\Config;

/**
 *
 */
class ConfigFactory
{
    /**
     * @param array<string, mixed> $config
     * @return CognitiveConfig
     */
    public function fromArray(array $config): CognitiveConfig
    {
        $metrics = array_map(function ($metric) {
            return new MetricsConfig(
                $metric['threshold'],
                $metric['scale'],
                $metric['enabled']
            );
        }, $config['cognitive']['metrics']);

        return new CognitiveConfig(
            excludeFilePatterns: $config['cognitive']['excludeFilePatterns'],
            excludePatterns: $config['cognitive']['excludePatterns'],
            metrics: $metrics,
            showOnlyMethodsExceedingThreshold: $config['cognitive']['showOnlyMethodsExceedingThreshold'],
            scoreThreshold: $config['cognitive']['scoreThreshold'],
            showHalsteadComplexity: $config['cognitive']['showHalsteadComplexity'] ?? false,
            showCyclomaticComplexity: $config['cognitive']['showCyclomaticComplexity'] ?? false
        );
    }
}
