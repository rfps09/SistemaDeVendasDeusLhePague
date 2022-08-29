<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\PedidoController;

Route::get('/', [ProdutosController::class,'index'])->name('home');

Route::get('/results', [ProdutosController::class,'index'])->name('search');

Route::get('/produto/{id}', [ProdutosController::class,'produtoPagina'])->name('paginaProduto');

Route::get('/cadastro/produto', [ProdutosController::class,'cadastrar'])->name('paginaCadastroProduto');

Route::post('/cadastro/produto/salvar', [ProdutosController::class,'store'])->name('salvarProduto');

Route::get('/edicao/produto', [ProdutosController::class,'edicao'])->name('paginaEdicaoProdutos');

Route::get('/edicao/produto/{id}', [ProdutosController::class,'editar'])->name('paginaEdicaoProduto');

Route::post('/edicao/produto/salvar/{id}', [ProdutosController::class,'change'])->name('editarProduto');

Route::get('/remove/produto/{id}', [ProdutosController::class,'remover'])->name('removerProduto');

Route::get('/carrinho',[CarrinhoController::class, 'carrinho'])->name('carrinho');

Route::get('/carrinho/adicionar/{id}', [CarrinhoController::class, 'adicionarCarrinho'])->name('adicionarCarrinho');

Route::get('/carrinho/remover/{index}', [CarrinhoController::class, 'removerCarrinho'])->name('removerCarrinho');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/meusPedidos', [PedidoController::class, 'pedidos'])->name('meusPedidos');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/comprar', [CarrinhoController::class, 'comprar'])->name('comprar');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
