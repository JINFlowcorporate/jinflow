<?php

namespace App\Http\Livewire;

use App\Models\Biens;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\UserBien;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Shakurov\Coinbase\Facades\Coinbase;

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

    public $payment_method;
    public $coinbase;

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
            'payment_method' => 'required'
        ];
    }

    public function placeOrder()
    {
        $method = $this->payment_method === 'stripe' ? 'stripe' : 'coinbase';
        return redirect()->route('payment', compact('method'));
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
        $this->lastname = Auth::check() ? Auth::user()->lastname . 'fdshjdsfds' : '';
        $this->email = Auth::check() ? Auth::user()->email : '';
        $this->phone = Auth::check() ? Auth::user()->phone : '';
        $this->address = Auth::check() ? Auth::user()->address : '';
        $this->city = Auth::check() ? Auth::user()->city : '';
        $this->state = Auth::check() ? Auth::user()->state : '';
        $this->zipcode = Auth::check() ? Auth::user()->zipcode : '';
        $this->billing_country = Auth::check() ? Auth::user()->billing_country : '';
        $this->coinbase = 'coinbase';
    }

    public function coinbaseMethod()
    {
        $charge = Coinbase::createCharge([
        'name' => 'JINFlow Test',
        'description' => 'Description test',
        'local_price' => [
            'amount' => Cart::total(),
            'currency' => 'USD',
        ],
        'metadata' => [
            //  'cart_id' => 1,
            'user_id' => Auth::id()
        ],
        'pricing_type' => 'fixed_price',
        'redirect_url' => 'https://jinflow-preprod.herokuapp.com/confirmation',
        'cancel_url' => 'https://jinflow-preprod.herokuapp.com'
    ]);

    return redirect()->away($charge['data']['hosted_url']);
    }

    public function changeCoinbase($method)
    {
        $this->coinbase = $method;

        if ($this->coinbase === 'stripe')
        {
            $this->dispatchBrowserEvent('methodChanged');
        }
    }

    public function render()
    {
        $biens = Cart::content();
        $total = Cart::total();
        return view('livewire.checkout', compact('biens', 'total'));
    }
}
