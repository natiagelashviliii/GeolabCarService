<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Admin;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function Index() {
        $services = Services::all();
        return view('admin/services/index', ['services' => $services]);
    }

    public function EditService($ID = 0) {
        $Service = Services::find($ID);
        return view('admin/services/edit', ['Data' => $Service]);
    }

    public function EditServicePost(Request $request) {
        $service = new Services();
        $service->where('id', '=', $request->input('ServiceID'))->update([
            'title' => $request->input('Title'),
        ]);

        if($request->hasFile('ServiceLogo')) {
            $fileFullName    = $request->file('ServiceLogo')->GetClientOriginalName();
            $fileName        = pathinfo($fileFullName, PATHINFO_FILENAME);
            $fileExt         = $request->file('ServiceLogo')->GetClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $path            = $request->file('ServiceLogo')->storeAs('public/services', $fileNameToStore);

            $service->where('id', '=', $request->input('ServiceID'))->update([
                'image' => $fileNameToStore
            ]);
        }
        return redirect()->route('admin.services.index')->with('info', true);
    }

}
