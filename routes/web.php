<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;//追記
use App\Http\Controllers\DeliveryController;//追記
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


Route::resource('items', ItemController::class);  // items用の一括ルーティング

Route::get('list',[ItemController::class, 'list']);  //商品一覧の表示

Route::resource('deliveries', DeliveryController::class);  //納品Delivery用の一括ルーティング

Route::get('delivery',[DeliveryController::class, 'index']);  //商品一覧の表示

Route::get('/', [ItemController::class, 'index']);

//test
Route::get('/show', function () {
  return view('itemsShow');
});


