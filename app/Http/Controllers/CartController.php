<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;

class CartController extends Controller
{
public function index()
{
    $cartItems = Cart::with('item')->get();
    return response()->json($cartItems);
}

  public function addToCart(Request $request)
{
    $this->validate($request, [
        'item_id' => 'required|exists:items,id',
        'quantity' => 'integer|min:1'
    ]);

    $existingCart = Cart::where('item_id', $request->item_id)->first();

    if ($existingCart) {
        $existingCart->quantity += $request->quantity ?? 1;
        $existingCart->save();
        return response()->json($existingCart);
    }

    $cart = Cart::create([
        'item_id' => $request->item_id,
        'quantity' => $request->quantity ?? 1
    ]);

    return response()->json($cart, 201);
}

    public function removeFromCart($cart_id)
    {
        $cart = Cart::findOrFail($cart_id);
        $cart->delete();

        return response()->json(['message' => 'Item dihapus dari keranjang']);
    }

    public function updateQuantity(Request $request, $cart_id)
    {
        $this->validate($request, [
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::findOrFail($cart_id);
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json($cart);
    }
}