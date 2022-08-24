<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;//追記

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// items用の一括ルーティング
Route::resource('items', ItemController::class);

Route::get('/', [ItemController::class, 'index']);
Route::get('/create', [ItemController::class, 'create']);

Route::get('/show', function () {
  return view('itemsShow');
});

