<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $title;
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
        $this->title = 'Login Page';
    }

    public function showLoginForm()
    {
        return view('auth.login', ['title' => $this->title]);
    }

    public function login(Request $request)
    {
       # Validate the form data
        $request->validate([
            //'email' => 'required|email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            
        ]);

        # Attempt to log thenamein
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('home'));
         } else {
        
        return back()->withErrors(['name' => 'These credentials do not match our records.'])->withInput($request->only('name', 'remember'));
        }
    }
}