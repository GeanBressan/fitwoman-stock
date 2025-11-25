<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Preço')
                    ->money("BRL")
                    ->sortable(),
                TextColumn::make('category_id')
                    ->label('Categoria')
                    ->getStateUsing(fn ($record) => $record->category?->name)
                    ->searchable(),
                TextColumn::make('size')
                    ->label('Tamanho')
                    ->badge(),
                TextColumn::make('stock_quantity')
                    ->label('Quantidade em Stock')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('Estoque Baixo')
                    ->query(fn ($query) => $query->where('stock_quantity', '<', 5)),
                SelectFilter::make('category_id')
                    ->label('Categoria')
                    ->relationship('category', 'name')
                    ->multiple()
            ])
            ->recordActions([
                EditAction::make()
                ->color('info'),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
