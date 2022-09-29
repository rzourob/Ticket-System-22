<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{
    public function chekGuard($request){

        if($request->type == 'technician'){
            $guardName= 'technician';
        }
        elseif ($request->type == 'admin'){
            $guardName= 'admin';
        }
 
        else{
            $guardName= 'web';
        }
        
        return $guardName;
    }

    public function redirect($request){

        if($request->type == 'technician'){
            return redirect()->intended(RouteServiceProvider::TECHNICIAN);
        }
        elseif ($request->type == 'admin'){
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
        // elseif ($request->type == 'teacher'){
        //     return redirect()->intended(RouteServiceProvider::TEACHER);
        // }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
