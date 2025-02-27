<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\ContactMail;
use Mail;

class messageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::get();
        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        return view ('messages', compact ('messages','unreadMessages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'name'=>'required|string',
            'email'=>'required|string', 
            'message' => 'required|string',
        ]);
        Message::create ($data);
        $unreadMessageCount = Message::where('readmsg', false)->count();
        Session::put('unreadMessageCount', $unreadMessageCount);
        Mail::to('eman@email.com')->send(
            new ContactMail($data));
        return redirect('us')->with('success', 'Message sent successfully!');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $unreadMessages = Message::where('readmsg', false)->take(6)->get();
        $messages = Message::findOrFail($id);
        return view('showMsg', compact('messages','unreadMessages'));
    }
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) 
    {
        Message::where('id', $id)->forceDelete();
        return redirect('message');
    }
}
