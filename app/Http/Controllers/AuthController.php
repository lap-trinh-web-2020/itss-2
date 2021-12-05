<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Tag;
use App\PostTag;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
if(!isset($_SESSION))
{
    session_start();
}

class AuthController extends Controller
{
    public function  login(Request $request){
        return view('user.login');
    }

    public function register(Request $request){
        return view('user.register');
    }
    public function store(Request $request)
    {
        $restauran = new User;
        $restauran->user_name = $request->user_name;
        $restauran->email = $request->email;
        $restauran->password = bcrypt($request->password);
        $restauran->isRestauran = 1;
        $restauran->des = $request->des;
        $restauran->save();
        $number_of_users = User::where('isRestauran', 0)->count();
        $number_of_restaurans = User::where('isRestauran', 1)->count();
        $number_of_posts = Post::count();
            $number_of_tags = Tag::count();
            $users = User::all();
            $posts = Post::all();
            $tags = Tag::all();
            $tags = $tags->SortByDesc('tag_id');
        return view('admin.home')
        ->with(compact('number_of_users', $number_of_users))
        ->with(compact('number_of_restaurans', $number_of_restaurans))
        ->with(compact('number_of_posts', $number_of_posts))
                ->with(compact('number_of_tags', $number_of_tags))
                ->with(compact('users', $users))
                ->with(compact('posts', $posts))
                ->with(compact('tags', $tags));
    }

    public function profile(Request $request){
        return view('user_profile');
    }

    public function change_pass(Request $request){
        return view('user.change_pass');
    }
}
