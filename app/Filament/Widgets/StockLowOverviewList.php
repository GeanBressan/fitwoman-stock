<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StockLowOverviewList extends TableWidget
{
    public function getTableHeading(): string|Htmlable|null
    {
        return "Produtos com Estoque Baixo";
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Product::query()->where('stock_quantity', '<=', 5))
            ->columns([
                TextColumn::make('name')
                    ->label('Nome do Produto'),
                TextColumn::make('stock_quantity')
                    ->label('Quantidade em Stock')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // export csv
                Action::make('exportCsv')
                    ->label('Exportar CSV')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(fn() => $this->exportCsv()),
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    protected function exportCsv(): StreamedResponse
    {
        $fileName = 'produtos_estoque_baixo-' . now()->format('Y-m-d_H-i-s') . '.csv';

        // se quiser respeitar filtros da tabela, pode usar um método específico da sua versão
        $query = Product::query()->where('stock_quantity', '<=', 5);

        return response()->streamDownload(function () use ($query) {
            $handle = fopen('php://output', 'w');

            // Cabeçalho do CSV
            fputcsv($handle, ['Nome do Produto', 'Quantidade em Stock']);

            // Evita estourar memória em tabelas grandes
            $query->chunk(200, function ($products) use ($handle) {
                foreach ($products as $product) {
                    fputcsv($handle, [
                        $product->name,
                        $product->stock_quantity,
                    ]);
                }
            });

            fclose($handle);
        }, $fileName, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
