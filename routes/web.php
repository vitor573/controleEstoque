<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Produtos\ProdutosController;

Route::get('/produtos/datatables', [ProdutosController::class, 'getProdutos']);

Route::resource('/produtos', ProdutosController::class);
