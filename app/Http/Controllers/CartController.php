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
        // dd($request->price);
        if (!is_array($listId)) {
            $listId = [$listId];
        }
        if (!is_array($listId)) {
            $listQuantily[] = [$listQuantily];
        }
        if (is_null($listQuantily)) {
            $listQuantily[] = 1;
        }
        foreach ($listId as $key => $idProduct) {
            // dd($listQuantily);
            if ($request->price) {
                if ($request->price[$key] != 0) {
                    $quan_old = 0;

                    $cart = Cart::where([
                        'product_id' => $idProduct,
                        'user_id' => Auth::id(),
                    ])->get();

                    if (!empty($cart[0])) {
                        $quan_old = $cart[0]->quantily;
                    }

                    Cart::updateOrCreate([
                        'product_id' => $idProduct,
                        'user_id' => Auth::id(),
                    ], [
                        'quantily' => ($quan_old + $listQuantily[$key])
                    ]);
            }
        }}
        return redirect()->route('cart');
    }

    public function update(Request $request)
    {
        // dd($request->quantily[0]);
        foreach ($request->id as $key => $id) {
            Cart::where('id', $id)->update(['quantily' => $request->quantily[$key]]);
        }
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

    public function addCart(Request $request)
    {   
        if($request->quantily==0)
        return \response()->json([], 403);
        $quan_old = 0;

        $cart = Cart::where([
            'product_id' => $request->id,
            'user_id' => Auth::id(),
        ])->get();

        if (!empty($cart[0])) {
            $quan_old = $cart[0]->quantily;
        }

        Cart::updateOrCreate([
            'product_id' => $request->id,
            'user_id' => Auth::id(),
        ], [
            'quantily' => ($quan_old + $request->quantily)
        ]);
        return \response()->json([
            "data" => count(Auth::user()->carts()->get()),
        ], 200);
    }
}
