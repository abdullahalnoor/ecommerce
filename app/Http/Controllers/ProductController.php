<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductImage;
use Session;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('admin.product.index',[
            'products'=>$products,
        ]);
    }
    public function create(){
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        return view('admin.product.create',[
            'categories'=>$categories,
            'brands'=>$brands,
        ]);
    }
    public function store(Request $request){
        $this->validate($request,$this->rules(),$this->messages());
        // return $request->all();
        $product = new Product();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().time().$image->getClientOriginalName();
            $path = 'frontend/img/';
            $link  = $path.$imageName;
            $image->move($path,$imageName);
            $product->image = $link;
        }
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->save();

        if($request->hasFile('images')){
            $images = $request->file('images');

            foreach($images as $image){
                $imageName = uniqid().time().$image->getClientOriginalName();
                $path = 'frontend/img/';
                $link  = $path.$imageName;
                $image->move($path,$imageName);

                $productImage = new ProductImage();
                $productImage->product_id =  $product->id;
                $productImage->image = $link;
                $productImage->save();
            }
            
        }
    }
    private function rules(){
        return [
            'category_id' => 'required',
            'brand_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'slider_image' => 'required|image|mimes:jpeg,jpg,png',
        ];
    }
    private function messages(){
        return [

            'category_id.required'=> 'The category field is required.',
            'brand_id.required'=> 'The category field is required.',
        ];
    }
}
