<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\Category;

class pageController extends Controller


{
    
    public function index ()
    {
        return view('drinkMenu');
    }
    

    public function special ()
    {
        return view('specialDrink');
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

