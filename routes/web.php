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

Route::get('/sign_in', function (){return view('sign_in');})->name('sign_in_show');
Route::get('/sign_up', function (){return view('sign_up');})->name('sign_up_show');

Route::post('/sign_in', [MainController::class, 'sign_in'])->name('sign_in');
Route::post('/sign_up', [MainController::class, 'sign_up'])->name('sign_up');
Route::get('/sign_out', function(){ Auth::logout(); return redirect()->route('index')->withErrors(['mess'=>'Вы вышли из аккаунта!']); })->name('sign_out');

Route::get('/my_applications', [MainController::class, 'user_appl'])->name('user_appl');


Route::get('/admin_index/{where?}', [MainController::class, 'admin_index'])->name('admin_index');