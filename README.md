<p align="center"><a href="#" target="_blank"><img src="./public/images/fit-woman-logo.png" width="400" alt="FitWoman Logo"></a></p>

![GitHub repo size](https://img.shields.io/github/repo-size/GeanBressan/codehub)
![GitHub last commit](https://img.shields.io/github/last-commit/GeanBressan/codehub)
![GitHub issues](https://img.shields.io/github/issues/GeanBressan/codehub)
![GitHub contributors](https://img.shields.io/github/contributors/GeanBressan/codehub)

![Made with Laravel](https://img.shields.io/badge/Made%20with-Laravel-red?style=for-the-badge&logo=laravel)
![Made with PHP](https://img.shields.io/badge/Made%20with-PHP-blue?style=for-the-badge&logo=php)

# 📚 FitWoman Stock – Painel de Estoque e Pedidos

Sistema web desenvolvido em **Laravel + Filament** para gerenciar
produtos, estoque e pedidos de uma loja de roupas fitness.

## 📝 Sobre o projeto
Este projeto foi desenvolvido como estudo/prática de
Laravel + Filament focado em casos reais de negócio
(gestão de estoque para loja física).

## 🧩 Funcionalidades

- Cadastro de produtos (nome, descrição, preço, quantidade, categoria, tamanho)
- Cadastro de categorias
- Registro de pedidos (produto, quantidade, data, total)
- Atualização automática de estoque ao registrar pedido
- Relatório de estoque baixo
- Relatório de vendas mensais (com gráfico)
- Dashboard com visão geral:
  - Total de produtos
  - Vendas no mês
  - Quantidade de pedidos no mês
  - Quantidade de itens com estoque baixo

## 🛠 Tecnologias

- PHP 8.x
- Laravel 11
- Filament 3
- MySQL
- Tailwind (via Filament)
- Chart widgets do Filament

## 🚀 Como rodar o projeto

```bash
git clone https://github.com/seu-usuario/fitwoman-stock.git
cd fitwoman-stock

cp .env.example .env
# configure o .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD)

composer install
php artisan key:generate
php artisan migrate --seed

php artisan serve
```

Acesse: http://localhost:8000/admin

Login padrão (seed):

Email: admin@fitwoman.test

Senha: password

## 📂 Estrutura principal
- app/Models/Product.php

- app/Models/Category.php

- app/Models/Order.php

- app/Filament/Resources/ProductResource.php

- app/Filament/Resources/CategoryResource.php

- app/Filament/Resources/OrderResource.php

- app/Filament/Widgets/StockOverview.php

- app/Filament/Widgets/MonthlySalesChart.php