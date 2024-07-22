<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\userController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\pageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('test', function () {
    return view('test1');
});

// // Route::get('cat', function () {
// //     return view('cate');
// // });


Route::get('add', function () {
    return view('contectus');
});

//users
        Route::get('userlist', [userController::class, 'index'])->name('userlist');
        Route::get('adduser', [userController::class, 'create'])->name('adduser');
        Route::post('insertuser', [userController::class, 'store'])->name('insertuser');
        Route::get('edituser/{id}', [userController::class, 'edit'])->name('edituser');
        Route::put('updateuser/{id}', [userController::class, 'update'])->name('updateuser');


//Drinks
        Route::get('drinkList', [DrinkController::class, 'index'])->name('drinkList');
        Route::get('drinks', [DrinkController::class, 'create'])->name('drinks');
        Route::post('insertdrink', [DrinkController::class, 'store'])->name('insertdrink');
        Route::get('editDrink/{id}', [DrinkController::class, 'edit'])->name('editDrink');
        Route::put('updateDrink/{id}', [DrinkController::class, 'update'])->name('updateDrink');
        Route::get('showclients/{id}', [DrinkController::class, 'show'])->name('showclients');
        Route::delete('deleteDrink/{id}', [DrinkController::class, 'destroy'])->name('deleteDrink');

//Category
        Route::get('categories',[categoryController::class, 'index'])->name('categories');
        Route::get('addcate',[categoryController::class, 'create'])->name('addcate');
        Route::post('insertcate', [categoryController::class, 'store'])->name('insertcate');
        Route::get('editcate/{id}', [categoryController::class, 'edit'])->name('editcate');
        Route::put('updatecate/{id}', [categoryController::class, 'update'])->name('updatecate');
        Route::get('showcate/{id}', [categoryController::class, 'show'])->name('showcate');
        Route::delete('deletecate/{id}', [categoryController::class, 'destroy'])->name('deletecate');


//Messages
        Route::post('uscontact', [messageController::class, 'store'])->name('uscontact');
        // Route::get('editDrink/{id}', [DrinkController::class, 'edit'])->name('editDrink');
        // Route::put('updateDrink/{id}', [DrinkController::class, 'update'])->name('updateDrink');
        // Route::get('showclients/{id}', [DrinkController::class, 'show'])->name('showclients');


//pages
        Route::get('drinkMenu', [pageController::class, 'index'])->name('drinkMenu');
        Route::get('aboutus', [pageController::class, 'about'])->name('aboutus');
        Route::get('us', [PageController::class, 'contact'])->name('us');
        Route::get('specialDrink', [PageController::class, 'special'])->name('specialDrink');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
