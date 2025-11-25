<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Models\Product;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->label('Produto')
                    ->relationship('product', 'name')
                    ->required()
                    ->searchable(),
                TextInput::make('quantity')
                    ->label('Quantidade')
                    ->required()
                    ->numeric()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $get) {
                        $product = Product::find($get('product_id'));
                        if ($product) {
                            $total = ($product->price * $get('quantity')) - $get('discount');
                            $set('total_amount', $total);
                        }
                    }),
                TextInput::make('discount')
                    ->label('Desconto')
                    ->numeric()
                    ->prefix('R$')
                    ->step(0.01)
                    ->default(null)
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $get) {
                        $product = Product::find($get('product_id'));
                        if ($product) {
                            $total = ($product->price * $get('quantity')) - $get('discount');
                            $set('total_amount', $total);
                        }
                    }),
                TextInput::make('total_amount')
                    ->label('Valor Total')
                    ->required()
                    ->numeric()
                    ->prefix('R$'),
            ]);
    }
}
