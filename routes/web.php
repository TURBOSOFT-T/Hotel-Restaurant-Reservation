<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/Route::get('/', function () {
    return view('welcome');
});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('frontend.home');
// });
// Route::get('/about', function () {
//     return view('frontend.AboutPage');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('menus', "\App\Http\Controllers\MenuController");
Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');


