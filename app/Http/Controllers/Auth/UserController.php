<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return view('user.user_profile')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit_user')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find(auth()->user()->user_id);

        if ($request->isMethod("POST")) {
            if ($request->hasFile('avatar_url')) {
                $path = $this->save_image($request->file('avatar_url'));
                $user->avatar_url = $path['data']['url'];
            }
            $request->validate([
                'phone' => 'min:11|numeric',
            ]);

            $user->last_name = $request->input('lastname');
            $user->first_name = $request->input('firstname');
            $user->birthday = $request->input('birthday');
            $user->gender = $request->input('gender');
            $user->des = $request->input('des');

            $user->address = $request->input('address');
            $user->phone = $request->input('phone');
        }
        if ($request->input('pass0') && $request->input('pass1')) {
            $hashedPassword = $user->password;
            if (Hash::check($request->input('pass0'),$hashedPassword)) {
                if($request->input('pass1')==$request->input('pass2')){
                    $user->password = Hash::make($request->input('pass1'));
                    return redirect("/users/$user->user_id")->with('alert', 'Your password updated!!');

                }else{
                    return redirect("/users/$user->user_id/edit")->with('alert','Confirm password not match!!');
                }
            } else {
                // Current Password not match ps in db
                return redirect("/users/$user->user_id/edit")->with('alert', 'Your current password not correct!!');
            }
        }
        $user->save();
        return redirect("/users/$user->user_id");
    }

    public function posts($user_id)
    {
        $user = User::find($user_id);
        $posts = User::find($user_id)->posts;
        return view('user.posts')->with(compact(['posts', $posts], ['user', $user]));
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
