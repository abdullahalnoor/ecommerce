<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralSetting;
use Session;

class GeneralSettingController extends Controller
{
    public function viewLogoIcon(){
        return view('admin.general-setting.logo-icon.index');
    }
    public function updateLogo(Request $request){
    //   return  $request->all();
        $this->validate($request,[
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:10000',
        ]);
        if($request->hasFile('logo')){
            @unlink(asset('img/logo.png'));
            $image = $request->file('logo');
            $imageName = 'logo'.'.'.'png';
            $path = 'img/';
            $image->move($path,$imageName);
            Session::flash('success','Logo Uploaded Successfully.. ');
        }
        return back();
    }
    public function updateIcon(Request $request){
        $this->validate($request,[
            'icon' => 'required|image|mimes:jpeg,jpg,png|max:10000',
        ]);
        if($request->hasFile('icon')){
            @unlink(asset('img/icon.png'));
            $image = $request->file('icon');
            $imageName = 'icon'.'.'.'png';
            $path = 'img/';
            $image->move($path,$imageName);
            Session::flash('success','Fav icon Uploaded Successfully.. ');
        }
        return back();
    }

    public function generalInformation(){
         $generalSetting =  GeneralSetting::first();
        return view('admin.general-setting.general-information.index',compact('generalSetting'));
    }
    public function updateGeneralInformation(Request $request){
        $generalSetting =  GeneralSetting::first();
        $generalSetting->site_name = $request->site_name;
        $generalSetting->site_title = $request->site_title;
        $generalSetting->currency_symbol = $request->currency_symbol;
        $generalSetting->currency_name = $request->currency_name;
        $generalSetting->save();
        Session::flash('success','Information Updated Successfully.. ');
        return back();
    }

}
