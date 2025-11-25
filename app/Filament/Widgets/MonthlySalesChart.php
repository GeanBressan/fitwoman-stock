<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\ChartWidget\Concerns\HasFiltersSchema;
use function Filament\Support\format_money;

class MonthlySalesChart extends ChartWidget
{
    use HasFiltersSchema;
    protected ?string $heading = 'Vendas';

    protected function filtersSchema(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('modo')
                ->label('Tipo de Relatório')
                ->options([
                    'mensal' => 'Vendas por Mês (Ano)',
                    'diario' => 'Vendas por Dia (Mês)',
                ])
                ->default('mensal')
                ->reactive(),

            Select::make('ano')
                ->label('Ano')
                ->options(
                    Order::selectRaw('YEAR(created_at) as ano')
                        ->distinct()
                        ->orderBy('ano', 'desc')
                        ->pluck('ano', 'ano')
                )
                ->default(now()->year)
                ->reactive(),

            Select::make('mes')
                ->label('Mês')
                ->options([
                    1 => 'Jan',
                    2 => 'Fev',
                    3 => 'Mar',
                    4 => 'Abr',
                    5 => 'Mai',
                    6 => 'Jun',
                    7 => 'Jul',
                    8 => 'Ago',
                    9 => 'Set',
                    10 => 'Out',
                    11 => 'Nov',
                    12 => 'Dez'
                ])
                ->default(now()->month)
                ->reactive()
                ->visible(fn(callable $get) => $get('modo') === 'diario'),
        ]);
    }

    protected function getData(): array
    {
        return $this->filters['modo'] === 'mensal'
            ? $this->getMensal()
            : $this->getDiario();
    }

    private function getMensal(): array
    {
        $ano = $this->filters['ano'] ?? now()->year;

        $result = Order::selectRaw('MONTH(created_at) as mes, SUM(total_amount) as total')
            ->whereYear('created_at', $ano)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $labels = [];
        $data = [];

        foreach ($result as $row) {
            $labels[] = \Carbon\Carbon::createFromDate(null, $row->mes, 1)->translatedFormat('M');
            $data[] = $row->total;
        }

        $total = number_format(array_sum($data), 2, ',', '.');

        $this->heading = "Vendas em {$ano} - R$ {$total}";

        return [
            'datasets' => [
                [
                    'label' => 'Vendas por mês',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    private function getDiario(): array
    {
        $ano = $this->filters['ano'] ?? now()->year;
        $mes = $this->filters['mes'] ?? now()->month;

        $result = Order::selectRaw('DAY(created_at) as dia, SUM(total_amount) as total')
            ->whereYear('created_at', $ano)
            ->whereMonth('created_at', $mes)
            ->groupBy('dia')
            ->orderBy('dia')
            ->get();

        $labels = [];
        $data = [];

        foreach ($result as $row) {
            $labels[] = str_pad($row->dia, 2, '0', STR_PAD_LEFT);
            $data[] = $row->total;
        }

        $total = number_format(array_sum($data), 2, ',', '.');

        $this->heading = "Vendas em {$ano}/{$mes} - R$ {$total}";

        return [
            'datasets' => [
                [
                    'label' => 'Vendas por dia',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<JS
            {
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            label: (context) => {
                                let value = context.parsed.y;
                                return 'R$' + Number(value).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            callback: (value) => 'R$' + Number(value).toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }),
                        },
                    },
                },
            }
        JS);
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
