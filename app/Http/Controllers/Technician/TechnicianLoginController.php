<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Traits\AuthTrait;
use Illuminate\Support\Facades\Auth;

class TechnicianLoginController extends Controller
{
    use AuthTrait;
    use AuthenticatesUsers;

public function __construct()
{
   $this->middleware('guest')->except('logout');
}


public function showLogin($type){

   return view('auth.login' , compact('type'));
}

   public function login(Request $request)
   {
       $credentials = [
         
           'email' => $request->get('email'),
           'password' => $request->get('password'),
       ];

           if (Auth::guard($this->chekGuard($request))->attempt($credentials, $request->get('remember_me'))){
              return $this->redirect($request); 
       }

       return redirect()->back()->withInput($request-> only('email','remember'));
   }


   public function logout(Request $request, $type)
   {
       // return $type;
       Auth::guard($type)->logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect()->route('selection');
   }
}
