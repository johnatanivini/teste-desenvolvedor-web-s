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

    Route::get('admin/clientes','Client@index')->name('admin.client.index');
    Route::get('admin/clientes/{id}','Client@details')->name('admin.client.details');
    Route::post('admin/clientes','Client@store')->name('admin.client.store');
    Route::get('admin/clientes/form','Client@form')->name('admin.client.form');
    Route::get('admin/clientes/editar/{id}','Client@edit')->name('admin.client.edit');
    Route::delete('admin/clientes/{id}','Client@destroy')->name('admin.client.destroy');
    Route::put('admin/clientes/{id}','Client@update')->name('admin.client.update');

    Route::get('admin/produtos','Product@index')->name('admin.product.index');
    Route::get('admin/produtos/{id}','Product@details')->name('admin.product.details');
    Route::get('admin/produtos/novo','Product@create')->name('admin.product.create');

    Route::get('admin/pedidos','Order@index')->name('admin.order.index');
    Route::get('admin/pedidos/{id}','Order@details')->name('admin.order.details');
    Route::get('admin/pedidos/novo','Order@create')->name('admin.order.create');

});
