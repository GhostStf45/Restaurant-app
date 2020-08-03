<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    //
    public function add(Product $product)
    {
        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
        return redirect()->route('cart.index');
    }
    public function index()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();

        return view('cart.index', compact('cartItems'));
    }
    public function destroy($itemId)
    {
        \Cart::session(auth()->id())->remove($itemId);

        return back();
    }
    public function update($rowId)
    {
        \Cart::session(auth()->id())->update($rowId, [
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);

        return back();

    }
    public function clear()
    {
        \Cart::session(auth()->id())->clear();
        Alert::success('Tu carrito ha sido vaciado correctamente.');
        return back();

    }
}
