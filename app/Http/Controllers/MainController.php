<?php

namespace App\Http\Controllers;

use App\Models\Socials;
use App\Models\Services;
use App\Models\Slider;
use App\Models\Email;
use App\Models\Subscribes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Index() {
    	$Data = [];

    	$Data['Slider']   = DB::table('sliders')->where('status_id', '=', 1)->get();
    	$Data['Services'] = Services::all();
    	$Data['Socials']  = Socials::all();

    	return view('main/index', ['Data' => $Data]);
    }

    public function sendMail(Request $request)
    {
        $email = new Email();

        $email->name    = $request->input('Name');
        $email->email   = $request->input('Email');
        $email->subject = $request->input('Subject');
        $email->message = $request->input('Message');
        $email->gender  = $request->input('Gender');
        $email->save();

        if (!empty($request->ReciveData)) {
            $EmailsLastInsertedID = DB::getPdo()->lastInsertId();
            Email::where('id', '=', $EmailsLastInsertedID)->update(['subscribe_status' => '1']);
            foreach ($request->ReciveData as $key => $value) {
                $subscribes           = new Subscribes();
                $subscribes->email_id = $EmailsLastInsertedID;
                $subscribes->type     = $value;
                $subscribes->save();
            }
        }

        return ['Message' => 'Succes'];
    }
}
