<?php

namespace App\Http\Controllers;
use App\Models\Drink;
use App\Models\Category;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\categoryController;
use Illuminate\Http\Request;

class frontPController extends Controller
{
   

    

        public function index()
        {
            $categories = Category::take(3)->get();
            $drinks = Drink::get(); 
        
            return view('test1', compact('categories', 'drinks'));
        }
    


    public function special ()
    {

        $drinks= Drink::take(6)->where('special',true)->get();          // Fetch only the special
        return view('includes.special', compact('drinks'));
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
 
