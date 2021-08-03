<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $req)
    {
        // dd($req);
        $user = $req->email;
        $pass = $req->password;
        // dd($req->All());
        if (filter_var($user, FILTER_VALIDATE_EMAIL)) {
            if (auth()->attempt(['email' => $user, 'password' => $pass])) {
                
                $title  = '👋 Welcome ' . ucwords(auth()->user()->name) . '!';
                $msg    = welcome_word();
                $notification = toaster($msg, 'success', $title);

                return redirect()->intended('/')->with($notification);
            }
        } else {
            if (auth()->attempt(['username' => $user, 'password' => $pass])) {
                
                $title  = '👋 Welcome ' . ucwords(auth()->user()->name) . '!';
                $msg    = welcome_word();
                $notification = toaster($msg, 'success', $title);

                return redirect()->intended('/')->with($notification);
            }
        }
        
        $msg = 'Invalid Username / Password';
        $notification = toaster($msg, 'error', 'Oops!');
        // toast($msg,'error');
        // Alert::error('Oops!', $msg);
        return redirect()->back()->with($notification);
    }
    
    // Login
    public function showLoginForm(){
      $pageConfigs = [
          'bodyClass' => "bg-full-screen-image",
          'blankPage' => true
      ];

      return view('/auth/login', [
          'pageConfigs' => $pageConfigs
      ]);
    }
}
