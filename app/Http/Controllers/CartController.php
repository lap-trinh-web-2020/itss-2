<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Request $request)
    {
        Cart::firstOrCreate([
            'product_id' => $request->get('id'),
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('cart');
    }

    public function update(Request $request)
    {
        Cart::where('id', $request->get('id'))->update(['quantily'=> $request->get('quantily')]);
        return redirect()->route('cart');
    }

    public function delete(Request $request)
    {
        Cart::where('id', $request->get('id'))->delete();
        return redirect()->route('cart');
    }
}
