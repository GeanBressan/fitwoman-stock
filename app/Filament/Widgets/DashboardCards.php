<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardCards extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $totalProducts = Product::where("stock_quantity", ">", 0)->count();
        $salesThisMonth = Order::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_amount');
        $totalOrders = Order::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
        $productsWithLowStock = Product::where('stock_quantity', '<=', 5)->count();
        $productsWithoutStock = Product::where('stock_quantity', '=', 0)->count();

        return [
            Stat::make('Total Produtos', $totalProducts)
                ->description('Produtos disponíveis em estoque')
                ->icon('heroicon-o-check-circle'),

            Stat::make('Vendas no Mês', "R$ " . number_format($salesThisMonth, 2, ',', '.'))
                ->description('Total de vendas realizadas no mês atual')
                ->icon('heroicon-o-currency-dollar'),

            Stat::make('Total de Pedidos no Mês', $totalOrders)
                ->description('Pedidos realizados no mês atual')
                ->icon('heroicon-o-shopping-cart'),

            Stat::make('Produtos com estoque baixo', $productsWithLowStock)
                ->description('Produtos com quantidade de estoque menor ou igual a 5')
                ->icon('heroicon-o-exclamation-circle'),
                
            Stat::make('Produtos sem estoque', $productsWithoutStock)
                ->description('Produtos sem estoque disponíveis')
                ->icon('heroicon-o-x-circle'),
        ];
    }
}
