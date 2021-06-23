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
Route::get('login', [LoginController::class, 'index'])
->name('login');

Route::post('login', [LoginController::class, 'acesso'])->name('login.acessar');


Route::middleware('auth:web')
->group(function() {

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::view('admin','Dashboard@index')->name('dashboard');

    Route::get('/admin/cliente','Client@index')->name('admin.client.index');
    Route::get('/admin/cliente/cadastro','Client@form')->name('admin.client.form');
    Route::get('/admin/cliente/{id}','Client@details')->name('admin.client.details');
    Route::get('/admin/cliente/editar/{id}','Client@edit')->name('admin.client.edit');
    Route::post('/admin/cliente','Client@store')->name('admin.client.store');
    Route::delete('/admin/cliente/{id}','Client@destroy')->name('admin.client.destroy');
    Route::put('/admin/cliente/{id}','Client@update')->name('admin.client.update');
    Route::get('/admin/cliente/cpf/{cpf?}','Client@getByCpf')->name('admin.client.cpf');

    Route::get('/admin/produto','Product@index')->name('admin.product.index');
    Route::get('/admin/produto/cadastro','Product@form')->name('admin.product.form');
    Route::get('/admin/produto/{id}','Product@details')->name('admin.product.details');
    Route::get('/admin/produto/editar/{id}','Product@edit')->name('admin.product.edit');
    Route::post('/admin/produto','Product@store')->name('admin.product.store');
    Route::delete('/admin/produto/{id}','Product@destroy')->name('admin.product.destroy');
    Route::put('/admin/produto/{id}','Product@update')->name('admin.product.update');
    Route::get('/admin/produto/barcode/{barcode?}','Product@getByBarcode')->name('admin.product.barcode');

    Route::get('/admin/pedido','Order@index')->name('admin.order.index');
    Route::get('/admin/pedido/cadastro','Order@form')->name('admin.order.form');
    Route::get('/admin/pedido/{id}','Order@details')->name('admin.order.details');
    Route::post('/admin/pedido','Order@store')->name('admin.order.store');
    Route::get('/admin/pedido/editar/{id}','Order@edit')->name('admin.order.edit');
    Route::delete('/admin/pedido/{id}','Order@destroy')->name('admin.order.destroy');

});
