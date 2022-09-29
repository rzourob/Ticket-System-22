<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    //
    public function index()
    {
        return view('auth.selection');
    }


    public function dashboard()
    {
        // return view('adminLogin.dashboard');
        
        return view('userLogin.dashboard');
    }
}
