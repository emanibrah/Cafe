<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\userController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\frontpController;



Route::get('test', function () {
    return view('test1');
});

// // Route::get('cat', function () {
// //     return view('cate');
// // });
Auth::routes(['verify'=>true]);

//users routes
Route::middleware(['auth', 'access-level:user'])->group(function () {
  
        Route::get('/welocme', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('welcome');
    });
      
    // admin routes
    Route::middleware(['auth', 'access-level:admin'])->group(function () {
      
        Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->middleware('verified')->name('admin.dashboard');
    });
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');


Route::get('add', function () {
    return view('test1');
});
//users
        Route::get('userlist', [userController::class, 'index'])->middleware('verified')->name('userlist');
        Route::get('adduser', [userController::class, 'create'])->middleware('verified')->name('adduser');
        Route::post('insertuser', [userController::class, 'store'])->middleware('verified')->name('insertuser');
        Route::get('edituser/{id}', [userController::class, 'edit'])->middleware('verified')->name('edituser');
        Route::put('updateuser/{id}', [userController::class, 'update'])->middleware('verified')->name('updateuser');


//Drinks
        Route::get('drinkList', [DrinkController::class, 'index'])->middleware('verified')->name('drinkList');
        Route::get('drinks', [DrinkController::class, 'create'])->middleware('verified')->name('drinks');
        Route::post('insertdrink', [DrinkController::class, 'store'])->middleware('verified')->name('insertdrink');
        Route::get('editDrink/{id}', [DrinkController::class, 'edit'])->middleware('verified')->name('editDrink');
        Route::put('updateDrink/{id}', [DrinkController::class, 'update'])->middleware('verified')->name('updateDrink');
        Route::get('showclients/{id}', [DrinkController::class, 'show'])->middleware('verified')->name('showclients');
        Route::delete('deleteDrink/{id}', [DrinkController::class, 'destroy'])->name('deleteDrink');

//Category
        Route::get('categories',[categoryController::class, 'index'])->middleware('verified')->name('categories');
        Route::get('addcate',[categoryController::class, 'create'])->middleware('verified')->name('addcate');
        Route::post('insertcate', [categoryController::class, 'store'])->middleware('verified')->name('insertcate');
        Route::get('editcate/{id}', [categoryController::class, 'edit'])->middleware('verified')->name('editcate');
        Route::put('updatecate/{id}', [categoryController::class, 'update'])->middleware('verified')->name('updatecate');
        Route::get('showcate/{id}', [categoryController::class, 'show'])->middleware('verified')->name('showcate');
        Route::delete('deletecate/{id}', [categoryController::class, 'destroy'])->name('deletecate');


//Messages
        Route::get('message',[messageController::class, 'index'])->middleware('verified')->name('message');
        Route::post('uscontact', [messageController::class, 'store'])->middleware('verified')->name('uscontact');
        Route::get('showMsg/{id}', [messageController::class, 'show'])->middleware('verified')->name('showMsg');
        Route::delete('deletemsg/{id}', [messageController::class, 'destroy'])->name('deletemsg');


//pages
        Route::get('drinkMenu', [pageController::class, 'index'])->name('drinkMenu');
        Route::get('drink/category/{categoryId}', [pageController::class, 'getDrinksByCategory'])->name('drink.category');
        Route::get('aboutus', [pageController::class, 'about'])->name('aboutus');
        Route::get('us', [PageController::class, 'contact'])->name('us');
        Route::get('specialDrink', [PageController::class, 'special'])->name('specialDrink');



        Route::get('menu', [frontpController::class, 'index'])->name('menu');
        Route::get('drink/category/{categoryId}', [frontpController::class, 'getDrinksByCategory'])->name('drink.category');

        Route::get('aboutus', [pageController::class, 'about'])->name('aboutus');
        Route::get('us', [PageController::class, 'contact'])->name('us');
        Route::get('specialDrink', [PageController::class, 'special'])->name('specialDrink');


//         Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
//       ->name('logout');

