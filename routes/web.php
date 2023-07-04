<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\ContactUsFormController;
=======
use \App\Http\Controllers\MenuController;
>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa

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

<<<<<<< HEAD
Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');
=======
Route::resource('menus', "\App\Http\Controllers\MenuController");
Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');


>>>>>>> 78d58579d8af94d392951da7171030736b2e03fa
