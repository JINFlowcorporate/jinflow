<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartController extends Component
{
    protected $listeners = ['toggleMenu' => 'toggleM'];
    public $open = false;

    public function render()
    {
        $biens = Cart::content();
        Cart::setGlobalTax(0);
        $total = Cart::total();
        return view('livewire.cart-controller', compact(['biens', 'total']));
    }

    public function toggleM()
    {
        $this->open = !$this->open;
    }

    public function removeItemCart($rowId)
    {
        Cart::remove($rowId);
        $this->emit('cart_updated');
        $this->render();
    }
}
