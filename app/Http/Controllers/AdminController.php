<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function delete($user_id){
        $user = User::find($user_id);
        if(!isset($user)){
            return redirect('/admin/home-page');
        }
        if($user->admin){
            return redirect('/admin/home-page')->with('alert','管理者ユーザーを削除できません。');
        }

        User::find($user_id)->delete();
        return redirect('/admin/home-page');

    }

    public function show_user_info($id)
    {
        $user = User::find($id);
        $post = Post::where('user_id', $id)->get();
        $like = DB::table('user_post_like')
            ->join('posts', 'posts.post_id', '=', 'user_post_like.post_id')
            ->join('users', 'users.user_id', '=', 'posts.user_id')
            ->selectRaw('posts.*, users.user_name, sum(like_state) as top')
            ->where('posts.user_id', $id)
            ->groupBy('posts.post_id')->orderByDesc('posts.post_id')->get()->toArray();
        // dd($like);
        if(empty($like)){
            $like=0;
        }

        return view('admin.users_info', compact('user','post', 'like'));
    }

    public function manageUsers()
    {
        $users = User::where('isrestauran', '=', 0)->get();

        return view('admin.users_show', compact('users'));
    }

    public function manageRestaurants()
    {
        $restaurants = User::where('isrestauran', '=', 1)->get();

        return view('admin.restauran_show', compact('restaurants'));
    }

    public function managePosts()
    {
        $posts = Post::all();

        return view('admin.posts_show', compact('posts'));
    }

    public function manageTags()
    {
        $tags = Tag::all();

        return view('admin.tags_show', compact('tags'));
    }

    public function manageProducts()
    {
        $products = Product::all();

        return view('admin.product_show', compact('products'));
    }
}
