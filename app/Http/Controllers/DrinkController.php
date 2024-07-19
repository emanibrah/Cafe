<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\Category;
use App\Traits\UploadFile;

class DrinkController extends Controller
{

    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drinks= Drink::get();
        return view('drinkList', compact('drinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories =Category::get();
        return view('addDrink', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data= $request->validate([
            'title'=>'required|string|max:50',
            'content'=>'required',
            'price'=>'required',
            'image' => 'required',
            'category_id'=>'required', 
                ]);
       // return dd($request->all());
        // 
            // 'price'=>'required', 
            // 'image' => 'required',
            // 'category_id'=>'required', 
       

        $fileName = $this->uploadFile($request->image, 'assets/img');    
        $data['image'] = $fileName;
        $data['publish'] = isset($request-> publish);
        $data['special'] = isset($request-> special);
        // $data['puplish'] = $request->has('active'); 
        // $data['special'] = $request->has('special_active');
        //return dd($request->all());

        Drink::create ($data);
        return redirect('drinkList');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drinks = Drink::findOrFail($id);
        return view('drinkList', compact('drinks'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::get();
        $drinks= Drink::findOrFail($id);
        return view('editDrink', compact('drinks', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title'=>'required|string|max:50',
            'content'=>'required',
            'price'=>'required',
            'image' => 'required',
            //'category_id'=>'required',
                        ]);
               
        $fileName = $this->uploadFile($request->image, 'assets/img');    
        $data['image'] = $fileName;
        $data['publish'] = $request->has('active'); 
        $data['special'] = $request->has('special_active');
       
        //return dd($request->all());
       Drink::where('id', $id)->update($data);
        return redirect('drinkList');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Drink::where('id', $id)->forceDelete();
        return redirect('drinkList');
    }
}
