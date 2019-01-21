<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\Company;

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
    protected $redirectTo = 'manage/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // public function authenticate()
    // {
    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
            
    //         if (!(Auth::user()->hasRole('superadministrator'))) {

    //             dd("dsfsdfd");
    //             $id=Auth::user()->company_id;
    //             $companyName=Company::findOrFail($id)->name;
    //             Session::put('companyId', $id);
    //             Session::put('companyName', $companyName);
    //             return redirect()->intended('manage/companies/'.$id);
    //         }else{

    //             return redirect()->intended('manage/dashboard');

    //         }


            
    //     }
    // }

        

    public function logout(Request $request) {
        $this->guard()->logout();

        $request->session()->flush();
    
        $request->session()->regenerate();
    
        return redirect('/login');
      }



}
