<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\categoryController;
Route::get('/', function () {
    return view('test1');
});

Route::get('user', function () {
    return view('test');
});

// Route::get('cat', function () {
//     return view('cate');
// });


Route::get('add', function () {
    return view('adduser');
});

        Route::get('drinkList', [DrinkController::class, 'index'])->name('drinkList');
        Route::get('clients', [DrinkController::class, 'creat'])->name('clients');
        Route::post('insetclient', [DrinkController::class, 'store'])->name('insetclient');
        Route::get('editclients/{id}', [DrinkController::class, 'edit'])->name('editclients');
        Route::put('updateclients/{id}', [DrinkController::class, 'update'])->name('updateclients');
        Route::get('showclients/{id}', [DrinkController::class, 'show'])->name('showclients');
        Route::delete('deleteclient', [DrinkController::class, 'destroy'])->name('deleteclient');

        Route::get('categories',[categoryController::class, 'index'])->name('categories');
        Route::get('addcate',[categoryController::class, 'create'])->name('addcate');
        Route::post('insertcate', [categoryController::class, 'store'])->name('insertcate');

