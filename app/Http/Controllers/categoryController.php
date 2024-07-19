<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories= Category::get();
        return view('cate', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addcate');

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
        $categories= Category::findOrFail($id);
        return view('editcate', compact( 'categories'));
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
        // قم بالبحث عن الفئة بناءً على الـ ID وحذفها بشكل دائم
        $category = Category::find($id);
        
        if (!$category) {
            return redirect('cate')->with('error', 'Category not found');
        }
        
        // تأكد من أن الفئة ليست لها علاقات قبل حذفها بشكل دائم
        if ($category->drinks()->count() > 0) {
            return redirect('cate')->with('error', 'Category has related drinks, cannot be deleted');
        }
    
        $category->forceDelete();
    
        return redirect('cate')->with('success', 'Category deleted successfully');
    }
    
}
