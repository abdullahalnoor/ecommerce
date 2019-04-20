<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Session;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create(){
        return view('admin.slider.create');
    }
    public function store(Request $request){
        $this->validate($request,$this->rules('required'));
        $slider = new Slider();
        if($request->hasFile('image')){
            $image = $request->file('image');          
            $slider->image = $this->uploadImage($image);
        }
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
        return $slider;
    }
    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }
  
    public function update(Request $request){
        $this->validate($request,$this->rules('nullable'));
        $slider =  Slider::find($request->slider_id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $slider->image = $this->uploadImage($image);
        }
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
        return $slider;
    }
    public function delete(Request $request){
        try{
            $slider = Slider::find($request->delete_id);
            @unlink($slider->image);
            $slider->delete();
            return response(['success'=>'Data Deletd Successfully.. '],204);
         }catch(\Exception $e){
            return response(['error'=>'Resource Not Found.. '],404);
        }
    }
    private function uploadImage($image){
        $imageName = uniqid().$image->getClientOriginalName();
        $path = 'frontend/img/';
        $link = $path.$imageName;
        $image->move($path,$imageName);
        return $link;
    }
    private function rules($option){
        return [
            'title' => 'required',
            'description' => 'required',
            'image' => $option.'|image|mimes:jpeg,jpg,png',
        ];  
    }
}
