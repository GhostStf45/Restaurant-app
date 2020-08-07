<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class OrderController extends Controller
{
    //
    public function index()
    {

    }
    public function create()
    {
        return view('cart.checkout');
    }
    public function store(Request $request)
    {

        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'shipping_district' => 'required',
        ]);
        $order = new Order();

        $order->order_number = uniqid('OrderNumber-');

        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_phone = $request->input('shipping_phone');
        $order->shipping_district = $request->input('shipping_district');

        if(!$request->has('billing_fullname'))
        {
            $order->billing_fullname = $request->input('shipping_fullname');
            $order->billing_state = $request->input('shipping_state');
            $order->billing_city = $request->input('shipping_city');
            $order->billing_address = $request->input('shipping_address');
            $order->billing_phone = $request->input('shipping_phone');
            $order->billing_district = $request->input('shipping_district');
        }else{
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_state = $request->input('billing_state');
            $order->billing_city = $request->input('billing_city');
            $order->billing_address = $request->input('billing_address');
            $order->billing_phone = $request->input('billing_phone');
            $order->billing_district = $request->input('billing_district');
        }


        $order->grand_total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

        $order->user_id = auth()->id();

        if(request('payment_method') == "paypal")
        {
            $order->payment_method = 'paypal';
        }
        if(request('payment_method') == "card")
        {
            $order->payment_method = 'card';
        }


        $order->save();
        //save order items

        $carItems = \Cart::session(auth()->id())->getContent();

        foreach($carItems as $item){
            $order->items()->attach($item->id, ['price'=>$item->price, 'quantity'=>$item->quantity]);
        }

        //payment
       if(request('payment_method') == "paypal")
        {
            //redirect to paypal
            return redirect()->route('paypal.checkout', $order->id);
        }

        //empty cart
        \Cart::session(auth()->id())->clear();
        //send email to customer

        //take user to thank you
        return redirect()->route('home')->withMessage("Su orden se completo satisfactoriamente");

    }
}
