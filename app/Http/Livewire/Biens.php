<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Biens extends Component
{
    public $item;
    public $quantity = 1;

    public function mount($slug)
    {
        $this->item = \App\Models\Biens::where('slug', $slug)->first();
    }

    public function addToCart($id)
    {
        $bien = \App\Models\Biens::where('id', $id)->first();
        Cart::add($bien->id, $bien->name, $this->quantity, $bien->price / 100, 550);

        $this->emit('cart_updated');
    }


    public function render()
    {
        $cart = Cart::content();

        return view('livewire.biens', compact('cart'));
    }
}
