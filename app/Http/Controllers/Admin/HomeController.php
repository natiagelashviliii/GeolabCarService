<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Admin;
use App\Models\Socials;
use App\Models\Services;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index() {
        $Data = [];
        $Data['SliderCnt']   = DB::table('sliders')->where('status_id', '=', '1')->count();
        $Data['ServicesCnt'] = DB::table('services')->count();
        $Data['SubscCnt']    = DB::table('emails')->where('subscribe_status', '=', '1')->count();
        return view('admin.dashboard.index', ['Data' => $Data]);
    }
}
