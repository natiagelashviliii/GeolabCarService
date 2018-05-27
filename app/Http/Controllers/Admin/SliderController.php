<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Admin;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function Index() {
        $slider = DB::table('sliders')->whereIn('status_id', [0,1])->get();
        return view('admin/slider/index', ['slider' => $slider]);
    }

    public function AddSlider() {
        return view('admin/slider/add');
    }

    public function AddSliderPost(Request $request) {

        $fileNameToStore = ($request->hasFile('SliderImage')) ? $this->UploadImage($request->file('SliderImage')) : 'noimage.jpg';

        $slider = new Slider();    
        $slider->title = $request->input('Title');
        $slider->image = $fileNameToStore;
        $slider->save();
        return redirect()->route('admin.slider.index')->with('info', true);
    }

    public function EditSlider($ID = 0) {
        $Slider = Slider::find($ID);
        return view('admin/slider/edit', ['Data' => $Slider]);
    }   

    public function DeleteSlider($ID = 0) {
        Slider::where('id', '=', $ID)->update(['status_id' => 2]);
        return redirect()->route('admin.slider.index')->with('info', true);
    }

    public function EditSliderPost(Request $request) {
        $slider = new Slider();
        $slider->where('id', '=', $request->input('SliderID'))->update([
            'title' => $request->input('Title'),
        ]);

        if($request->hasFile('SliderImage')) {
            $fileNameToStore = $this->UploadImage($request->file('SliderImage'));

            $slider->where('id', '=', $request->input('SliderID'))->update([
                'image' => $fileNameToStore
            ]);
        }
        return redirect()->route('admin.slider.index')->with('info', true);
    }

    public function ChangeSliderStatus($ID = 0) {
        $Slider = Slider::find($ID);
        $Status = $Slider->status_id == 0 ? 1 : 0;

        Slider::where('id', '=', $ID)->update(['status_id' => $Status]);
        return redirect()->route('admin.slider.index')->with('info', true);
    }

    private function UploadImage($Image = '') {
        $fileFullName    = $Image->GetClientOriginalName(); //Get File With Extension
        $fileName        = pathinfo($fileFullName, PATHINFO_FILENAME); //Get Filename
        $fileExt         = $Image->GetClientOriginalExtension(); //Get Extension
        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt; //Filename To Store
        $path            = $Image->storeAs('public/slider', $fileNameToStore); //upload

        return $fileNameToStore;
    }
}
