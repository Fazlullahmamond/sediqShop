<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class productController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function checkout()
    {
        if (Auth::check()) {

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $cartItems = CartItems::where('user_id', Auth::user()->id)->get();
            if($cartItems->isEmpty()){
                return redirect()->route('orders')->with('warning', 'Please login first!');
            }
            $lineItems = [];
            $totalPrice = 0;
            foreach ($cartItems as $cartItem) {
                $totalPrice += $cartItem->product->price;
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $cartItem->product->title,
                            // 'images' => [$cartItem->product->image]
                            'images' => ['https://attitude.lk/image/cache/data/bodyshop/hair/shea-shampoo-500x500.jpg']
                        ],
                        'unit_amount' => $cartItem->product->discount ? number_format($cartItem->product->price - ($cartItem->product->price * $cartItem->product->discount / 100), 2) * 100 : $cartItem->product->price * 100,
                    ],
                    'quantity' => $cartItem->quantity,
                ];
            }
            $session = Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('checkout.cancel', [], true),
            ]);

            // $order = new Order();
            // $order->status = 'unpaid';
            // $order->total_price = $totalPrice;
            // $order->session_id = $session->id;
            // $order->save();

            return redirect($session->url);
        }else{
            return redirect()->route('login')->with('warning', 'Please login first!');
        }
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException();
            }
            // $customer = \Stripe\Customer::retrieve($session->customer);

            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }

            return view('product.checkout-success', compact('customer'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }

    public function cancel()
    {
    }

    public function webhook()
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                $order = Order::where('session_id', $session->id)->first();
                if ($order && $order->status === 'unpaid') {
                    $order->status = 'paid';
                    $order->save();
                    // Send email to customer
                }

                // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }
}
