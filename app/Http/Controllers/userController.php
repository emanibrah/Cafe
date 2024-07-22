<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view ('userlist', compact ('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('adduser ', compact( 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'name'=>'required|string|max:50',
            'username' => 'required|string|max:15', 
            'email'=>'required',  
            'password'=>'required|min:8', 
        ]);
        $data['active'] = isset($request-> active);
        $data['password'] = Hash::make($data['password']);
        User::create ($data);
        return redirect('userlist');
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
        $users = User::findOrFail($id);
        return view('edituser', compact('users'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name'=>'required|string|max:50',
            'username' => 'required|string|max:15', 
            'email'=>'required',  
            'password'=>'required|min:8', 
        ]);
        $data['active'] = isset($request-> active);
        $data['password'] = Hash::make($data['password']);
        User::where('id', $id)->update($data);
        return redirect('userlist');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
