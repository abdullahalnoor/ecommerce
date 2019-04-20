<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->paginate(10);
        return view('admin.category.index',compact('categories'));
    }
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $this->validate($request,$this->rules());
        $category = new Category();
        
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return $category;
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
  
    public function update(Request $request){
        $this->validate($request,$this->rules());
        $category =  Category::find($request->category_id);
        
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return $category;
    }
    public function delete(Request $request){
        try{
            $category = Category::find($request->delete_id);
            $category->delete();
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
