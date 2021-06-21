<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])
->name('login');

Route::post('/login', [LoginController::class, 'acesso'])->name('login.acessar');


Route::middleware('auth:web')
->group(function() {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::view('/admin','Dashboard@index')->name('dashboard');
    Route::get('/admin/clientes','Client@index')->name('clients');
    Route::get('/admin/clientes/{id}','Client@details')->name('client.details');
    Route::get('/admin/clientes/create','Client@create')->name('client.create');

    Route::get('/admin/produtos','Product@index')->name('products');
    Route::get('/admin/produtos/{id}','Product@details')->name('product.details');
    Route::get('/admin/produtos/create','Product@create')->name('product.create');

    Route::get('/admin/pedidos','Order@index')->name('orders');
    Route::get('/admin/pedidos/{id}','Order@details')->name('order.details');
    Route::get('/admin/pedidos/create','Order@create')->name('order.create');

});
