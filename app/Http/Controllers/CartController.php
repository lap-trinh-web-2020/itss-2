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
        $success = false;
        return view('cart.index', compact('success'));
    }

    public function add(Request $request)
    {
        $listId = $request->get('id');
        $listQuantily = $request->get('quantily');
        if (!is_array($listId)) {
            $listId = [$listId];
        }
        if (!is_array($listId)) {
            $listQuantily[] = [$listQuantily];
        }
        foreach ($listId as $key => $idProduct) {
            Cart::firstOrCreate([
                'product_id' => $idProduct,
                'user_id' => Auth::id(),
                'quantily' => $listQuantily[$key] ?? null
            ]);
        }
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

    public function submitCart(Request $request)
    {
        Cart::where('user_id', Auth::id())->delete();
        $success = true;
        return view('cart.index', compact('success'));
    }
}
