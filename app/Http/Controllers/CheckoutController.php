<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', auth()->id())->first();

        // If there's a cart, get its items. If not, set items as an empty array.
        $items = $cart ? $cart->items : [];

        return view('checkout.index', compact('items'));
    }

    public function placeOrder(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phoneno' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pincode' => 'required|string|max:10',
            'message' => 'nullable|string|max:500',
        ]);
        $order = new Order();
        $order->user_id = auth()->id();  // Link the order to the authenticated user

        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phoneno = $request->phoneno;
        $order->address = $request->address;
        $order->address2 = $request->address2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->pincode = $request->pincode;
        // $order->status = $request->status;
        $order->message = $request->message;

        //to calculate the total price

        // $total = 0;
        // // $cartitems_total =Cart::where('user_id',Auth::id())->get();
        // // foreach($cartitems_total as $prod)
        // // {
        // //     $total +=$prod->products->selling_price;
        // // }
        // $cartitems_total = Cart::where('user_id', Auth::id())->get();
        // foreach ($cartitems_total as $prod) {
        //     if ($prod->products) { // Check if the products object is not null
        //         $total += $prod->products->selling_price;
        //     }
        // }
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();
        
        foreach ($cartitems_total as $cartItem) {
            $product = $cartItem->product; // Retrieve the product
            
            if ($product) {
                $total += $product->selling_price * $cartItem->quantity;
            }
        }
        
        $order->totalprice = $total;
        
        // $order->totalprice = $total;

        $order->tracking_no = 'bkrm' . rand(1111, 9999);
        $order->save();

        $cart = Cart::where('user_id', auth()->id())->first();

        if ($cart) {
            // foreach ($cart->items as $cartItem) {
            //     OrderItem::create([
            //         'order_id' => $order->id,
            //         'product_id' => $cartItem->product_id,
            //         'quantity' => $cartItem->quantity,
            //         'price' => $cartItem->product->selling_price,

            //     ]);

            //     // Optionally delete cart items after they're added to the order
            //     $cartItem->delete();
            // }
            foreach ($cart->items as $cartItem) {
                if ($cartItem->product) { // Check if the product is not null
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $cartItem->product_id,
                        'quantity' => $cartItem->quantity,
                        'price' => $cartItem->product->selling_price,
                    ]);
                }

                // Optionally delete cart items after they're added to the order
                $cartItem->delete();
            }
        }

        session()->flash('success', 'Order successfully placed!');

        // Optional: Redirect the user to a thank you or order confirmation page
        return redirect()->route('order.confirmation');
    }

    public function views()
    {
        $orders = Order::where('user_id', auth::id())->get();
        return view('checkout.order-view', compact('orders'));
    }
}
