<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\MenuController as FrontController;
use App\Http\Controllers\Back\AdminController;



use UniSharp\LaravelFilemanager\Lfm;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    Lfm::routes();
});
Route::view('admin', 'back.layout');

// Home
Route::name('home')->get('/', [FrontController::class, 'index']);
Route::name('category')->get('category/{category:slug}', [FrontController::class, 'category']);
Route::name('author')->get('author/{user}', [FrontController::class, 'user']);
Route::name('tag')->get('tag/{tag:slug}', [FrontController::class, 'tag']);
// web.php

Route::get('/contact', 'ContactController@show')->name('contact.show');
// web.php

Route::post('/contact', 'ContactController@submit')->name('contact.submit');


Route::prefix('menus')->group(function () {
    Route::name('menus.display')->get('{slug}', [FrontController::class, 'show']);
    Route::name('menus.search')->get('', [FrontController::class, 'search']);
});

Route::prefix('admin')->group(function () {
    Route::middleware('manager')->group(function () {
        Route::name('admin')->get('/', [AdminController::class, 'index']);
    });
});



Route::prefix('menus')->group(function () {
    Route::name('menus.display')->get('{slug}', [FrontController::class, 'show']);
});

Route::name('category')->get('category/{category:slug}', [FrontController::class, 'category']);

/* Route::get('/', function () {
    return view('welcome');
}); */



Route::name('home')->get('/', [FrontController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';