<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Admin;
use App\Models\Subscribes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubscribersController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $Data = DB::table('emails')->where('subscribe_status', '=', 1)->orderBy('id', 'desc')->paginate(8);
        return view('admin/subscribers/index', ['Data' => $Data]);
    }

}
