<?php

declare(strict_types=1);

namespace MyPlugin\DataProviders;

use DateTimeInterface;
use Signal\Core\Asset\Contracts\AssetInterface;
use Signal\Core\Asset\Contracts\KeyStatsInterface;
use Signal\Core\Asset\Contracts\QuoteInterface;
use Signal\Core\Collections\HistoricalQuoteCollection;
use Signal\Core\DataServices\FinancialMarketDataProviderInterface;
use Signal\Core\Enums\AssetType;
use Signal\Core\Enums\Interval;
use Signal\Core\ValueObjects\AssetLongName;
use Signal\Core\ValueObjects\AssetShortName;
use Signal\Core\ValueObjects\AssetSymbol;
use Signal\Core\ValueObjects\AssetVo;
use Signal\Core\ValueObjects\Currency;
use Signal\Core\ValueObjects\Exchange;
use Signal\Core\ValueObjects\MoneyAmount;
use Signal\Core\ValueObjects\OpenInterest;
use Signal\Core\ValueObjects\PeRatio;
use Signal\Core\ValueObjects\Quote;
use Signal\Core\ValueObjects\TradingVolume;

/**
 * Fixed Data Asset
 */
class MyDataProvider implements FinancialMarketDataProviderInterface
{
    /**
     * Get the asset and return AssetInterface
     */
    public function getAsset(string $symbol, AssetType $type = AssetType::Equities): AssetInterface|null
    {
        return new AssetVo(
            new AssetSymbol($symbol),
        );
    }

    public function getQuote(AssetInterface $asset): QuoteInterface|null
    {
        return new Quote(
            AssetType::Equities,
            $asset->getSymbol(),
            new AssetShortName('Tesla Inc.'),
            new AssetLongName('Tesla Inc.'),
            new Currency('USD'),
            new Exchange('NASDAQ'),
            new MoneyAmount(420.69),
            new MoneyAmount(420.69),
            new MoneyAmount(420.69),
            new MoneyAmount(420.69),
            new PeRatio(1),
            new PeRatio(1),
            new MoneyAmount(420.69),
            new OpenInterest(5),
            new TradingVolume(100000000),
        );
    }

    public function getHistoricalData(AssetInterface $asset, DateTimeInterface $startDate, DateTimeInterface $endDate, Interval $interval = Interval::Daily,): HistoricalQuoteCollection|null
    {
        return new HistoricalQuoteCollection([]);
    }

    /**
     * The core does not provide a concrete KeyStatsInterface object. So you need to
     * implement your own somewhere in you plugin.
     */
    public function getKeyStats(AssetInterface $asset): KeyStatsInterface|null
    {
        return new class implements KeyStatsInterface {

            public function getValuation(): MoneyAmount|null
            {
                return new MoneyAmount(100);
            }

            public function getRevenuePerShare(): MoneyAmount|null
            {
                return new MoneyAmount(100);
            }

            public function getTrailingPe(): PeRatio|null
            {
                return new PeRatio(1);
            }

            public function getForwardPe(): PeRatio|null
            {
                return new PeRatio(1);
            }
        };
    }

    public function getHistoricalDataForPastDays(AssetInterface $asset, int $days = 14, Interval $interval = Interval::Daily,): HistoricalQuoteCollection|null
    {
        return new HistoricalQuoteCollection([]);
    }
}
