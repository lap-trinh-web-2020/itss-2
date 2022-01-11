<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function index()
    {
        if(auth()->user()->admin){
            $users = User::all();
            $posts = Post::all();
            $tags = Tag::all();
            $products = Product::all();
            $tags = $tags->SortByDesc('tag_id');


            $number_of_users = User::where('isrestauran', 0)->count();
            $number_of_restaurans = User::where('isrestauran', 1)->count();
            $number_of_posts = Post::count();
            $number_of_tags = Tag::count();
            $number_of_product = Product::count();
            return view('admin.home')
                ->with(compact('number_of_users', $number_of_users))
                ->with(compact('number_of_restaurans', $number_of_restaurans))
                ->with(compact('number_of_posts', $number_of_posts))
                ->with(compact('number_of_tags', $number_of_tags))
                ->with(compact('number_of_product', $number_of_product))
                ->with(compact('users', $users))
                ->with(compact('posts', $posts))
                ->with(compact('products', $products))
                ->with(compact('tags', $tags));
        } else{
            return redirect('/');
        }
    }

    public function delete($user_id){
        $user = User::find($user_id);
        if(!isset($user)){
            return redirect('/admin/home-page');
        }
        if($user->admin){
            return redirect('/admin/home-page')->with('alert','Cannot delete admin user!');
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

}
