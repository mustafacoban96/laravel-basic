<?php

namespace App\Http\Controllers;

use App\Models\DetailImagePath;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function homePage(){

        
        return view('home');
    }


    public function productPage(){

        $products = Product::all();

        return view('product')->with('products',$products);
    }



    public function productDetail(Request $request, Product $product){
        $product_id = $product->id;
        $product = ProductDetail::find($product_id);
        //dd($product);
        $product_img_path = DetailImagePath::all()->where('product_id' ,$product_id)->first()->d_image_path;
        //dd($product_img_path);
        return view('productDetail')->with('product',$product)->with('product_images',$product_img_path);
    }


    public function aboutUs(){


        return view('aboutUs');
    }


    public function contactUs(){
        return view('contactUs');
    }
}
