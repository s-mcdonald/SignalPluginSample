<?php

declare(strict_types=1);

namespace MyPlugin\Analyzers;

use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Enums\IndicatorType;
use Signal\Core\Enums\Interval;
use Signal\Core\Enums\Signal;
use Signal\Core\Reporting\Analyzers\AnalyzerInterface;
use Signal\Core\ValueObjects\AnalyzerDescription;
use Signal\Core\ValueObjects\AnalyzerShortName;
use Signal\Core\ValueObjects\SignalAnalysis;
use Signal\Core\ValueObjects\SignalState;

class PrettyCoolAnalyzer implements AnalyzerInterface
{
    /**
     * The most important part of the analyzer is this method.
     */
    public function analyze(AssetInterface $stock): SignalAnalysis
    {
        // here is your logic to determine a rating.

        // Now we return the signal.
        return new SignalAnalysis(
            Signal::Buy,
            'The signal identifies a BUY rating',
        );
    }

    /**
     * @return IndicatorType Determines what kind of category your analyzer id.
     */
    public function getIndicatorType(): IndicatorType
    {
        return IndicatorType::Metrics;
    }

    /**
     * @return Interval Analyzing on a daily, weekly ??
     */
    public function getInterval(): Interval
    {
        return Interval::Daily;
    }

    public function getDescription(): AnalyzerDescription
    {
        return new AnalyzerDescription("The Pretty Cool Analysis Analyzer.");
    }

    public function getShortName(): AnalyzerShortName
    {
        return new AnalyzerShortName("PCA Analyzer");
    }

    public function getSignalState(AssetInterface $stock): SignalState
    {
        return new SignalState(
            $stock,
            Signal::Buy,
            "Some description",
            IndicatorType::Metrics,
            Interval::Daily,
            "raw value"
        );
    }
}
