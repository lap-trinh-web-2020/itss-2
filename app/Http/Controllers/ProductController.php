<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductPost;
use App\Tag;
use App\User;
use App\UserPostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\SESSION;
use App\Http\Requests;
use App\Post;
use App\PostTag;
use phpDocumentor\Reflection\Types\Compound;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

session_start();

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    # Get all post
    function all_product(Request $request)
    {
        $listProduct = Product::all();
        if ($request->ajax()) {
            return view('admin.home-page', compact('listProduct'))->render();
        }
        return view('product.show', compact('listProduct'));
    }

    public function create(Request $request)
    {
        $listProduct = Product::all();
        if ($request->isMethod('post')) {
            $product = new Product();
            $product->product_name = $request->product_name;
            if($request->product_price != NULL){
                $product->product_price = $request->product_price;
            }
            if ($request->hasFile('url_img')) {
                $path = $this->save_image($request->file('url_img'));
                $product->url_img = $path['data']['url'];
            }
            $product->save();
            return view('product.show', compact('listProduct'));
        }
        return view('admin.create_product', compact('listProduct'));
    }

    private function save_image($image, $name = null)
    {
        $API_KEY = 'c6817f9f49dc42bb4f04bf9c17721c89';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=' . $API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
        $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
        $file_name = ($name) ? $name . '.' . $extension : $image->getClientOriginalName();
        $data = array('image' => base64_encode(file_get_contents($image)), 'name' => $file_name);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        } else {
            return json_decode($result, true);
        }
        curl_close($ch);
    }

    public function delete($product_id)
    {
        $product = Product::find($product_id);
        if(!isset($product)){
            return redirect('admin.home-page');
        }
        Product::where('product_id', $product_id)->delete();
        return redirect('/admin/home-page');
    }

    public function edit(Request $request,$product_id){
        $product = Product::find($product_id);
        if(!isset($product)){
            return redirect('admin.home-page');
        }
        $products = Product::all();
        if($request->isMethod('post')){
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            if ($request->hasFile('url_img')) {
                $path = $this->save_image($request->file('url_img'));
                $product->url_img = $path['data']['url'];
            }
            $product->save();
            return redirect('/admin/home-page');
        }
        return view('admin.edit_product')->with(compact('product',$product));
    }

}