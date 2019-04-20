<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
     public function index(){
        $brands = Brand::orderBy('id','desc')->paginate(10);
        return view('admin.brand.index',compact('brands'));
    }
    public function create(){
        return view('admin.brand.create');
    }
    public function store(Request $request){
        $this->validate($request,$this->rules());
        $brand = new Brand();
        
        $brand->name = $request->name;
        $brand->status = $request->status;
        $brand->save();
        return $brand;
    }
    public function edit($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }
  
    public function update(Request $request){
        $this->validate($request,$this->rules());
        $brand =  Brand::find($request->brand_id);
        
        $brand->name = $request->name;
        $brand->status = $request->status;
        $brand->save();
        return $brand;
    }
    public function delete(Request $request){
        try{
            $brand = Brand::find($request->delete_id);
            $brand->delete();
            return response(['success'=>'Data Deletd Successfully.. '],204);
         }catch(\Exception $e){
            return response(['error'=>'Resource Not Found.. '],404);
        }
    }
   
    private function rules(){
        return [
            'name' => 'required',
            'status' => 'required',
        ];  
    }
}
