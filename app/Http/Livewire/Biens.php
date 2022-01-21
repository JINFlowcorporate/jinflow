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
        foreach (Cart::content() as $value)
        {
            if ($value->name === $bien->name && $bien->total_tokens <= $value->qty)
            {
                return session()->flash('stock', __('cart.stock-limit'));
            }
        }
        Cart::add($bien->id, $bien->name, $this->quantity, $bien->tokens_price, 550);

        $this->emit('cart_updated');
        session()->flash('message', __('cart.added'));
    }


    public function render()
    {
        return view('livewire.biens');
    }

}
