<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getAdminLogin () {

        return view('auth.admin.login');
    }

    public function login () {



        $prev_url = explode('8000', \Session::get('_previous.url'));

        switch (end($prev_url)) {
            case '/admin/login':
                $user_info = [ 'admin','admin'];
                break;
            
            default:
                $user_info = [ 'questions','web'];
                break;
        }

        

        if(Auth::guard($user_info[1])->attempt(['email' => request()->email , 'password' => request()->password ])) {


            return redirect()->intended($user_info[0]);

        } else {

            return redirect()->back()->withInput('email');

        }
    }
}
