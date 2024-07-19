<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\categoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('user', function () {
//     return view('test');
// });

// // Route::get('cat', function () {
// //     return view('cate');
// // });


// Route::get('add', function () {
//     return view('adduser');
// });

        Route::get('drinkList', [DrinkController::class, 'index'])->name('drinkList');
        Route::get('drinks', [DrinkController::class, 'create'])->name('drinks');
        Route::post('insertdrink', [DrinkController::class, 'store'])->name('insertdrink');
        Route::get('editDrink/{id}', [DrinkController::class, 'edit'])->name('editDrink');
        Route::put('updateDrink/{id}', [DrinkController::class, 'update'])->name('updateDrink');
        Route::get('showclients/{id}', [DrinkController::class, 'show'])->name('showclients');
        Route::delete('deleteDrink/{id}', [DrinkController::class, 'destroy'])->name('deleteDrink');


        Route::get('categories',[categoryController::class, 'index'])->name('categories');
        Route::get('addcate',[categoryController::class, 'create'])->name('addcate');
        Route::post('insertcate', [categoryController::class, 'store'])->name('insertcate');
        Route::get('editcate/{id}', [categoryController::class, 'edit'])->name('editcate');
        Route::put('updatecate/{id}', [categoryController::class, 'update'])->name('updatecate');
        Route::get('showcate/{id}', [categoryController::class, 'show'])->name('showcate');
        Route::delete('deletecate/{id}', [categoryController::class, 'destroy'])->name('deletecate');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
