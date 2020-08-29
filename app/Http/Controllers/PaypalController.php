<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\OrderPaid;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    //
    public function getExpressCheckout($orderId)
    {
        $checkoutData = $this->checkoutData($orderId);

        $provider = new ExpressCheckout();
        $response = $provider->setExpressCheckout($checkoutData);

        return redirect($response['paypal_link']);
    }
    private function checkoutData($orderId)
    {
        $cart =  \Cart::session(auth()->id());
        $cartItems = array_map( function($item){
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['quantity']
            ];
        }, $cart->getContent()->toarray());


        $checkoutData = [
            'items' => $cartItems,
            'return_url' => route('paypal.success', $orderId),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => 'Order description',
            'total' =>$cart->getTotal()
        ];
        return $checkoutData;
    }
    public function cancelPage()
    {
        dd('payment failed');
    }
    public function getExpressCheckoutSuccess(Request $request, $orderId)
    {
        $token = $request->get('token');
        $payerId =$request->get('PayerID');
        $provider = new ExpressCheckout();
        $checkoutData = $this->checkoutData($orderId);
        $response = $provider->getExpressCheckoutDetails($token);



        if(in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING']))
        {
            // Payform transaction on paypal
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData,$token, $payerId);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
            if(in_array($status, ['Completed','Processed']))
            {
                $order = Order::find($orderId);
                $order->is_paid = 1;
                $order->save();

                //send mail
                Mail::to($order->user->email)->send(new OrderPaid($order));

                Nexmo::message()->send([
                    'to'   => '51'.'969384222',
                    'from' => '51969384222',
                    'text' => 'Estoy en camino, le aviso cuando este cerca, muchas gracias por preferir Mikuy.'
                ]);



                return redirect('/satisfaction')->withMessage('Su recibo se envio a su correo.');
            }

        }
        return redirect('/')->withMessage('Payment Unsuccessfull something went wrong');
    }
}
