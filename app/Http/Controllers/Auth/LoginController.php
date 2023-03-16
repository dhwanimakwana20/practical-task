<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request, $user)
    {
        $current_user = auth()->user()->status;
        $admin = auth()->user()->id;
        $action_performed = auth()->user()->action_performed;
        if($admin == 1 && $current_user == 'approved'){
            return redirect('/home');
        }
        elseif ($admin != 1 &&  $action_performed==1  && $current_user =='approved') {
            return redirect()->route('approve');
        }elseif($admin != 1 && $action_performed==1 && $current_user =='unapproved'){
            return redirect()->route('unapprove');
        }else{
            return redirect()->route('pending');
        }

       
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
