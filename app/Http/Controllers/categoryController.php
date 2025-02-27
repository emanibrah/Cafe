<?php

namespace App\Http\Controllers;
use App\Models\Drink;
use App\Models\Category;
use App\Models\Message;


use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::get();
        $messages = Message::get();
        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        return view('cate', compact('categories','messages','unreadMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $messages = Message::get();
        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        return view('addcate',compact('messages','unreadMessages'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'cate_name'=>'required|string|max:50',
        ]);
        Category::create ($data);
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $messages = Message::get();
        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        $categories= Category::findOrFail($id);
        return view('editcate', compact( 'categories','messages','unreadMessages'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $request->validate([
            'cate_name'=>'required|string|max:50',
        ]);
        Category::where('id', $id)->update($data);
        return redirect('categories');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    
    {
        $categories = Category::findOrFail($id);
        $drinkCount = Drink::where('category_id', $categories->id)->count();

        if ($drinkCount > 0) {
            return redirect('categories')->with('error', 'Cannot delete category as it contains drinks.');
        }

        // If no cars associated, delete the category
        $categories->forceDelete();
        return redirect('categories')->with('success', 'Category deleted successfully.');
    }



        // قم بالبحث عن الفئة بناءً على الـ ID وحذفها بشكل دائم
    //     $category = Category::find($id);
        
    //     if (!$category) {
    //         return redirect('cate')->with('error', 'Category not found');
    //     }
        
    //     // تأكد من أن الفئة ليست لها علاقات قبل حذفها بشكل دائم
    //     if ($category->drinks()->count() > 0) {
    //         return redirect('cate')->with('error', 'Category has related drinks, cannot be deleted');
    //     }
    
    //     $category->forceDelete();
    
    //     return redirect('cate')->with('success', 'Category deleted successfully');
    // }
    
}
