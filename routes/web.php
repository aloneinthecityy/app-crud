<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
/*
ROTA COM MÉTODO PUT:
Uma rota com o método PUT foi criada para permitir a atualização de recursos específicos no servidor. 
No contexto do seu código, a rota com o método PUT está sendo usada para atualizar um produto existente.
Quando um cliente envia uma requisição PUT para essa rota específica, 
ele está indicando que deseja atualizar as informações de um produto específico. 
O parâmetro {product} na rota representa o identificador único (ID) desse produto.
Ao receber a requisição PUT, o controlador ProductController é responsável por processar 
a solicitação e atualizar o produto correspondente no banco de dados.
A utilização do método PUT é uma prática comum em APIs RESTful, onde cada rota é mapeada para uma ação específica. 
Isso permite que os clientes interajam com recursos individuais de forma precisa e padronizada.
*/

Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
