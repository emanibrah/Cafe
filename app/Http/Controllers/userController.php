<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        $messages = Message::get();
        $users = User::get();
        return view ('userlist', compact ('users','messages','unreadMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $messages = Message::get();
        $unreadMessages = Message::where('readmsg', false)->take(6)->get(); 
        $users = User::get();
        return view('adduser ', compact( 'users','messages','unreadMessages'));
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
        $messages = Message::get();
        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        $users = User::findOrFail($id);
        return view('edituser', compact('users','messages','unreadMessages'));
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
