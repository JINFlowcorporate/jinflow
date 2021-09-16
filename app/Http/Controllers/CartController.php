<?php

namespace App\Http\Controllers;

use App\Models\Biens;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
  /*      $bien = Biens::findOrFail($request->input('bien_id'));
        Cart::add($bien->id, $bien->name, $request->input('quantity'), $bien->price / 100, 550);

        return back();*/
    }
}
