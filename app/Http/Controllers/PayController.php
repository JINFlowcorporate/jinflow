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
        $total = Cart::total(2, '.', '');
        $cart_total_stripe = intval((int)$total * 100);
        $authed_user = Auth::user();
        $authed_user->createOrGetStripeCustomer();
        $authed_user->addPaymentMethod($request->payment_method);
        $authed_user->charge($cart_total_stripe, $request->payment_method);

        return redirect()->route('confirmation')->withSuccess('Success message');
    }
}
