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

        $months =   MaintenanceRequest :: select(DB :: raw("COUNT(*) as count"),DB :: raw("Month(created_at) as month"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB :: raw("Month(created_at)"))
        ->get('month','count')->toArray();

$data =[];
for ($i =1 ; $i<=12 ; $i++ )
{
    $ee= array_search($i,array_column($months,'month'));
    if($ee === false){
        $data[$i] = 0;
    
    }
    else{

        $data[$i] = $months[array_search($i,array_column($months,'month'))]['count'];
    }
}

//////

$dataTodo =   MaintenanceRequest :: select(DB :: raw("COUNT(*) as count"),DB :: raw("Month(created_at) as month"))
->whereYear('created_at',date('Y'))
->where('status','Done')
->groupBy(DB :: raw("Month(created_at)"))
->get('month','count')->toArray();

$data2 =[];
for ($i =1 ; $i<=12 ; $i++ )
{
$ss= array_search($i,array_column($dataTodo,'month'));
if($ss === false){
$data2[$i] = 0;

}
else{

$data2[$i] = $dataTodo[array_search($i,array_column($dataTodo,'month'))]['count'];
}
}

// dd($data);

        
        return view('admin.adminLogin.dashboard', ['aaa'=>$data ,'ttt'=>$data2]);
    }

    
}
