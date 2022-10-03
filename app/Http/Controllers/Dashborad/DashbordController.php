<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use App\Models\Device\Device;
use App\Models\Maintenance\MaintenanceRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $itTicketCount =   MaintenanceRequest :: select(DB :: raw("COUNT(*) as count"))
        // ->whereYear('created_at',date('Y'))
        // ->groupBy(DB :: raw("Month(created_at)"))
        // ->pluck('count');

        // $months =   MaintenanceRequest :: select(DB :: raw("Month(created_at) as month"))
        // ->whereYear('created_at',date('Y'))
        // ->groupBy(DB :: raw("Month(created_at)"))
        // ->pluck('month');

        // $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);

        // foreach($months as $index =>$month){
        //     $datas[$month] = $itTicketCount[$index];
        // }

        // $maintenanceRequests = MaintenanceRequest::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(DB::raw("Month(created_at)"))
        //             ->pluck('count', 'month_name');
 
        // $labels = $maintenanceRequests->keys();
        // $data = $maintenanceRequests->values();

        $data = MaintenanceRequest :: select ('id','created_at')->get()
        ->groupBy(function($data){
            return  Carbon:: parse($data->created_at)->format('M');
        });

        $months =[];
        $monthCount = [];
        foreach($data as $month => $values){
            $months[] = $month;
            $monthCount[] = count($values);
        }

        
        return view('admin.adminLogin.dashboard', ['data'=>$data ,'months'=>$months,'monthCount'=>$monthCount]);
    }

    
}
