<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\Category;
use App\Traits\UploadFile;
use App\Models\Message;

class DrinkController extends Controller
{

    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::get();
        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        $drinks= Drink::get();
        return view('drinkList', compact('drinks','messages','unreadMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $messages = Message::get();
        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        $categories =Category::get();
        return view('addDrink', compact('categories','messages','unreadMessages'));
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
        

        $fileName = $this->uploadFile($request->image, 'assets/img');    
        $data['image'] = $fileName;

        $data['publish'] = $request->has('active'); 
        $data['special'] = $request->has('special'); 
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
        $messages = Message::get();
        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        $categories = Category::get();
        $drinks= Drink::findOrFail($id);
        return view('editDrink', compact('drinks', 'categories','messages','unreadMessages'));
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
            'category_id'=>'required', 
           //'category_id' => 'required|exists:categories,id',
                        ]);
               
        $fileName = $this->uploadFile($request->image, 'assets/img');    
        $data['image'] = $fileName;
        $data['publish'] = $request->has('active'); // This checks if 'active' checkbox is checked
        $data['special'] = $request->has('special'); // This checks if 'special' checkbox is checked

       
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
