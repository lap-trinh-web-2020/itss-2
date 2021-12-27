<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Tag;
use App\PostTag;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;

if (!isset($_SESSION)) {
    session_start();
}

class AuthController extends Controller
{
    public function  login(Request $request)
    {
        return view('user.login');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();
            $request->validate(
                [
                    'phone' => 'required|min:11|numeric',
                    'avatar_url' => 'required',
                    'avatar_url.*' => 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:4096',
                ],
                [
                    'phone.min' => '10文字で電話を入力してください',
                    'avatar_url.required' => 'イメージをアップロードしてください',
                    'avatar_url.*.mimes' => '画像拡張子は「jpg, png, jpeg, gif, svg」が必要です',
                    'avatar_url.*.max' => 'イメージのサイズは4096超えできません',
                    'avatar_url.*.image' => 'イメージ以外はアップロードができません'
                ]
            );

            $path = $this->save_image($request->file('avatar_url'));

            $user = new User;

            $user->user_name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->avatar_url = $path['data']['url'];
            $user->des = "私は新しいユーザーであり、料理人です。";

            $user->save();

            return redirect('/login');
        }
        return view('user.register');
    }
    public function store(Request $request)
    {
        $request->flash();
        $request->validate(
            [
                'phone' => 'required|min:11|numeric',
                'avatar_url' => 'required',
                'avatar_url.*' => 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:4096',
            ],
            [
                'phone.min' => '10文字で電話を入力してください',
                'avatar_url.required' => 'イメージをアップロードしてください',
                'avatar_url.*.mimes' => '画像拡張子は「jpg, png, jpeg, gif, svg」が必要です',
                'avatar_url.*.max' => 'イメージのサイズは4096超えできません',
                'avatar_url.*.image' => 'イメージ以外はアップロードができません'
            ]
        );

        $path = $this->save_image($request->file('avatar_url'));

        $restauran = new User;
        $restauran->user_name = $request->user_name;
        $restauran->email = $request->email;
        $restauran->password = Hash::make($request->password);
        $restauran->isrestauran = 1;
        $restauran->avatar_url = $path['data']['url'];
        $restauran->des = $request->des;
        $restauran->save();

        $number_of_users = User::where('isrestauran', 0)->count();
        $number_of_restaurans = User::where('isrestauran', 1)->count();
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

    public function profile(Request $request)
    {
        return view('user_profile');
    }

    public function change_pass(Request $request)
    {
        return view('user.change_pass');
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
}
