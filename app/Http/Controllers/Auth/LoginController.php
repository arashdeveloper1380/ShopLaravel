<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Social;
use Egulias\EmailValidator\Result\Reason\UnclosedComment;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'email';
    }

    public function showLoginForm()
    {
        $Social = Social::where('status',1)->get();
        $Category = Category::all();
        $Setting = Setting::first();

        session()->put('previousUrl',url()->previous());

        return view('auth.login',compact('Social','Category','Setting'));
    }
    
    public function redirectTo()
    {
        $Role = Auth::User()->role;
        if($Role == 'admin'){
            return 'admin';
        }
        else{
            return str_replace(url('/'),'',session()->get('previousUrl','/'));
        }
    }

}
