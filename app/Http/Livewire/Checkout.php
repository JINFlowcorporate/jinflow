<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $modelId;
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $state;
    public $zipcode;
    public $billing_country;

    public $card_name;
    public $card_number;
    public $card_date;
    public $cvc;
    public $payment_method;
    public $stripe_token;

    /**
     * The validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zipcode' => 'required|numeric',
            'billing_country' => 'required|max:255',
            'card_name' => 'required|max:255',
            'card_number' => 'required|numeric|max:16',
            'card_date' => 'required',
            'cvc' => 'required|numeric'
        ];
    }

    public function placeOrder()
    {
        $this->dispatchBrowserEvent('generate-stripe-token');

        dd($this->stripe_token);
        $cart = Cart::content();
        $cart_total = Cart::total();

        Auth::user()->charge($cart_total, $this->payment_method);

        $order = new Order;
        $order_product = new OrderProduct;
        $order->user_id = $this->modelId;
        $order->quantity = $cart->count();
        $order->total = $cart_total;
        $order->save();

        foreach ($cart as $bien) {
            $order_product->order_id = $order->id;
            $order_product->bien_id = $bien->id;
            $order_product->quantity = $bien->qty;
            $order_product->price_per_token = $bien->price;
            $order_product->total_price = $bien->price * $bien->qty;
            $order_product->save();
        }
    }

    public function modelData()
    {
        return [
            'username' => $this->username,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
            'billing_country' => $this->billing_country
        ];
    }

    public function mount()
    {
        $this->modelId = Auth::check() ? Auth::user()->id : '';
        $this->username = Auth::check() ? Auth::user()->username : '';
        $this->firstname = Auth::check() ? Auth::user()->firstname : '';
        $this->lastname = Auth::check() ? Auth::user()->lastname : '';
        $this->email = Auth::check() ? Auth::user()->email : '';
        $this->phone = Auth::check() ? Auth::user()->phone : '';
        $this->address = Auth::check() ? Auth::user()->address : '';
        $this->city = Auth::check() ? Auth::user()->city : '';
        $this->state = Auth::check() ? Auth::user()->state : '';
        $this->zipcode = Auth::check() ? Auth::user()->zipcode : '';
        $this->billing_country = Auth::check() ? Auth::user()->billing_country : '';
    }

    public function render()
    {
        $biens = Cart::content();
        $total = Cart::total();
        return view('livewire.checkout', compact('biens', 'total'));
    }
}
