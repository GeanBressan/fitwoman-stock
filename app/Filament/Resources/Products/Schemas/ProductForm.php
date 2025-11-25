<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                Textarea::make('description')
                    ->label('Descrição')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label('Preço')
                    ->required()
                    ->numeric()
                    ->prefix('R$')
                    ->step(0.01),
                Select::make('category_id')
                    ->label('Categoria')
                    ->relationship('category', 'name')
                    
                    ->default(null),
                Select::make('size')
                    ->label('Tamanho')
                    ->options(['P' => 'P', 'M' => 'M', 'G' => 'G', 'XXL' => 'XXL'])
                    ->required(),
                TextInput::make('stock_quantity')
                    ->label('Quantidade em Stock')
                    ->required()
                    ->numeric(),
            ]);
    }
}
