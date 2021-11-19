<?php

namespace App\Http\Controllers;

use App\Models\Biens;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use App\Models\UserBien;
use App\Models\UserProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $total = Cart::total();
        return view('payment.index', compact('total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::content();
        $total = Cart::total(2, '.', '');
        $cart_total_stripe = intval((int)$total * 100);
        $cart_total = intval((int)$total);
        $authed_user = Auth::user();
        $authed_user->createOrGetStripeCustomer();
        $authed_user->addPaymentMethod($request->payment_method);
        $authed_user->charge($cart_total_stripe, $request->payment_method);

        $order = new Order;
        $order->user_id = $authed_user->id;
        $order->quantity = $cart->count();
        $order->total = $cart_total;
        $order->save();

        User::where('id', Auth::id())->update(['invested' => $authed_user->invested + $cart_total]);

        $orders = [];

        foreach ($cart as $bien)
        {
            $order_product = new OrderProduct;
            $order_product->order_id = $order->id;
            $order_product->biens_id = $bien->id;
            $order_product->quantity = $bien->qty;
            $order_product->price_per_token = $bien->price;
            $order_product->total_price = $bien->price * $bien->qty;
            $order_product->save();
            $bienToUpdate = Biens::where('id', $bien->id)->first();
            $bienToUpdate->total_tokens = $bienToUpdate->total_tokens - $bien->qty;
            $bienToUpdate->save();
            array_push($orders, $order_product);
            UserBien::create(['user_id' => $authed_user->id, 'biens_id' => $bien->id, 'quantity' => $bien->qty, 'price_per_token' => $order_product->price_per_token, 'total_price' => $order_product->total_price]);
            $bien = Biens::where('id', $bien->id)->first();
            $authed_user->invoiceFor($bien->name, intval((int)$bien->price * 100), [
                'quantity' => (int)$bien->qty
            ]);
        }

        dd($authed_user->invoice());

        return redirect()->route('confirmation')->withSuccess('Success message');
    }
}
