<?php

use Faker\Factory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('menu', App\Http\Controllers\MenuController::class);
// Factory(\App\Models\User::class , 5)->create();
// \App\Models\User::factory()->count(5)->create();
// \App\Models\Menu::factory()->count(5)->create();
// \App\Models\Item::factory()->count(5)->create();
// \App\Models\Order::factory()->count(5)->create();
// \App\Models\OrderItem::factory()->count(5)->create();
// \App\Models\OrderMeal::factory()->count(5)->create();
// \App\Models\OrderUser::factory()->count(5)->create();
Route::get('/menu/delete/{id}', 'App\Http\Controllers\MenuController@destroy')
    ->name('menu.destroy');
Route::get('/menu', 'App\Http\Controllers\MenuController@index')
    ->name('menu');

Route::post('/menu/store', 'App\Http\Controllers\MenuController@store')
    ->name('menu.store');
Route::PUT('/menu/update/{id}', 'App\Http\Controllers\MenuController@update')
    ->name('menu.update');

// Route::get('/menu/edit/{id}', 'App\Http\Controllers\MenuController@edit')
// ->name('menu.edit');