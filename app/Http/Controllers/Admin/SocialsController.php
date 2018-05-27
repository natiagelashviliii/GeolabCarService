<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Admin;
use App\Models\Socials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SocialsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function index() {
        $socials = Socials::all();
        return view('admin/socials/index', ['socials' => $socials]);
    }

    public function EditSocial(Request $request) {
        Socials::where('id', '=', 1)->update(['url' => $request->input('Facebook')]);
        Socials::where('id', '=', 2)->update(['url' => $request->input('Google')]);
        Socials::where('id', '=', 3)->update(['url' => $request->input('Twitter')]);
        return redirect()->route('admin.socials.index')->with('info', true);
    }
}
