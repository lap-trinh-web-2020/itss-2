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
            return view('product.product_data', compact('listProduct'))->render();
        }
        return view('product.show', compact('listProduct'));
    }
}
