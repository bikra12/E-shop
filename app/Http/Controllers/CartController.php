<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('addToCart');
    }


    // public function addToCart(Request $request, $productId)
    // {
    //     if (!auth()->check()) {
    //         return redirect('login')->with('error', 'Please log in to continue.');
    //     }
    //     // Find the product from the database using its ID.
    //     $product = Product::findOrFail($productId);

    //     // Get the cart for the currently logged-in user or create one if it doesn't exist.
    //     $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

    //     // Check if the product is already in the cart. If not, add it.
    //     $cartItem = $cart->items()->firstOrCreate(['product_id' => $productId]);

    //     // Increment the quantity of the product in the cart by 1.
    //     $cartItem->increment('quantity');

    //     // Return to the previous page and show a message.
    //     return redirect()->back()->with('message', 'Product added to cart!');
    // }

    public function addToCart(Request $request, $productId)
    {
        if (!auth()->check()) {
            return redirect('login')->with('error', 'Please log in to continue.');
        }

        $product = Product::findOrFail($productId);
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        $cartItem = $cart->items()->firstOrCreate(['product_id' => $productId]);

        $quantity = (int) $request->input('quantity', 1);

        if ($quantity <= 0) {
            return redirect()->back()->with('error', 'Invalid quantity specified.');
        }

        $cartItem->update(['quantity' => $quantity]);

        return redirect()->back()->with('message', 'Product added to cart!');
    }


    public function addTobuy(Request $request, $productId)
    {
        if (!auth()->check()) {
            return redirect('login')->with('error', 'Please log in to continue.');
        }

        $product = Product::findOrFail($productId);
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        $cartItem = $cart->items()->firstOrCreate(['product_id' => $productId]);

        $quantity = (int) $request->input('quantity', 1);

        if ($quantity <= 0) {
            return redirect()->back()->with('error', 'Invalid quantity specified.');
        }

        $cartItem->update(['quantity' => $quantity]);

        // return redirect()->back()->with('message', 'Product added to cart!');
        return redirect('/cart/view')->with('message', 'Product added to cart!');

    }



    public function viewCart()
    {
        // Get the cart for the currently logged-in user.
        $cart = Cart::where('user_id', auth()->id())->first();

        // If there's a cart, get its items. If not, set items as an empty array.
        $items = $cart ? $cart->items : [];

        // Show the cart view page and pass the items to it.
        return view('homepage.cartview', compact('items'));
    }


    
    public function removeFromCart($itemId)
    {
        // Find the cart item using its ID.
        $item = CartItem::find($itemId);

        // If the item exists, delete it.
        if ($item) {
            $item->delete();
        }

        // Return to the previous page and show a message.
        return redirect()->back()->with('message', 'Item removed from cart.');
    }
}
