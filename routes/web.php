<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/catalog', [MainController::class, 'catalog'])->name('catalog');
Route::get('/exemplairs_page/{id}', [MainController::class, 'exemplairs_page'])->name('exemplairs_page');

Route::get('/pre_application/{id}/{id_prod}', [MainController::class, 'pre_application'])->name('pre_application');

Route::post('/send_application', [MainController::class, 'send_application'])->name('send_application');