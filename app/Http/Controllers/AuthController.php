<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $restauran->save();
        $users = User::all();
        return view('admin.create_restauran')->with(compact('users', $users));
    }

    public function profile(Request $request){
        return view('user_profile');
    }

    public function change_pass(Request $request){
        return view('user.change_pass');
    }
}
