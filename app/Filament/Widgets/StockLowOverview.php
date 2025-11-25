<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class StockLowOverview extends ChartWidget
{
    protected ?string $heading = 'Stock Low Overview';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
