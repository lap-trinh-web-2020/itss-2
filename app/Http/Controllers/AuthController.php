<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'user_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create(request(['first_name','last_name','user_name','phone','email', 'password']));

        auth()->login($user);

        return redirect()->to('/games');
    }

    public function profile(Request $request){
        return view('user_profile');
    }

    public function change_pass(Request $request){
        return view('user.change_pass');
    }
}
