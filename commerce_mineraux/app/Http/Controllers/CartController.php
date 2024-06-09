<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = array_sum(array_column($cart, 'subtotal'));
        return view('user.cart', ['cartItems' => $cart, 'total' => $total]);
    }

    public function add($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produit non trouvé'], 404);
        }

        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['subtotal'] += $product->price;
        } else {
            $cart[$id] = [
                'product_id' => $product->product_id,
                'name' => $product->name,
                'price' => $product->price,
                'image_url' => $product->image_url,
                'quantity' => 1,
                'subtotal' => $product->price
            ];
        }

        Session::put('cart', $cart);

        return response()->json(['message' => 'Produit ajouté au panier']);
    }    
    
    public function update(Request $request, $id)
    {
        $cart = Session::get('cart', []);
        if (!isset($cart[$id])) {
            return redirect()->route('cart.index')->withErrors(['Produit non trouvé dans le panier']);
        }

        $cart[$id]['quantity'] = $request->quantity;
        $cart[$id]['subtotal'] = $cart[$id]['price'] * $request->quantity;

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }
}
