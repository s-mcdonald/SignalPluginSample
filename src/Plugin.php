<?php

declare(strict_types=1);

namespace MyPlugin;

use MyPlugin\Analyzers\PrettyCoolAnalyzer;
use MyPlugin\DataProviders\MyDataProvider;
use Signal\Core\Collections\AnalyzerCollection;
use Signal\Core\Collections\DataProviderCollection;

use Signal\Core\System\SystemPlugin;

class Plugin implements SystemPlugin
{
    public function getAnalyzerCollection(): AnalyzerCollection
    {
        return new AnalyzerCollection([
            new PrettyCoolAnalyzer(),
            // ... other analyzers here
        ]);
    }

    public function getDataProvidersCollection(): DataProviderCollection
    {
        return new DataProviderCollection([
            new MyDataProvider(),
            // ... other providers here
        ]);
    }
}
