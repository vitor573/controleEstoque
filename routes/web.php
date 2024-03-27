<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Produtos\ProdutosController;

Route::resource('/produtos', ProdutosController::class);

