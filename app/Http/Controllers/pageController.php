<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\Category;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\categoryController;
class pageController extends Controller


{
    
//     public function index()
// {
//     $categories = Category::take(3)->get();
//     $drinks = Drink::get(); 

//     return view('drinkMenu', compact('categories', 'drinks'));
// }

// public function getDrinksByCategory($categoryId)
// {
//     $category = Category::findOrFail($categoryId);
//     $drinks = $category->Drinkes()->get(); // تحميل المشروبات التي تنتمي للفئة المحددة

//     $categories = Category::take(3)->get(); // تحميل الفئات مرة أخرى لعرضها في القائمة الجانبية
    
//     return view('drinkMenu', compact('category', 'drinks'));
// }


   
        public function index()
        {
            $categories = Category::take(3)->get();
            $drinks = Drink::get(); 
        
            return view('drinkMenu', compact('categories', 'drinks'));
        }
    

    //     public function getDrinksByCategory($categoryId)
    // {
    //     $category = Category::findOrFail($categoryId);
    //     return view('drinkMenu', compact('category'));
    // }


    // public function getDrinksByCategory($categoryId)
    // {
    //     $category = Category::findOrFail($Id);
    //        $categories = Category::with('drinks')->get();
    //     return view('drinkMenu', compact('category'));
    // }

        // public function index()
        // {
        //     $categories = Category::take(3)->get();
        //     $drinks = Drink::get(); 
        
        //     return view('drinkMenu', compact('categories', 'drinks'));
        // }
    
        // $categories = Category::with('drinks')->get();
        // $drinks = Drink::findOrFail($id);
        // return view('drinkMenu', compact('categories', 'drinks'));


    public function special ()
    {

        $drinks= Drink::take(6)->where('special',true)->get();          // Fetch only the special
        return view('specialDrink', compact('drinks'));
    }


    public function about ()
    {
        return view('aboutUs');
    }
    
    //contact
    public function contact ()
    {
        return view('contectus');
    }
}

