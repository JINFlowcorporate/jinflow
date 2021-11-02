<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public $modalDetailsVisible = false;
    public $modelId;
    public $biens = [];
    public $order_product;
    public $order;
    public $customer;
    public $fullname;

    public function detailsShowModal($id)
    {
        $this->modalDetailsVisible = true;
        $this->order = Order::where('id', $id)->first();
        $this->order_product = $this->order->order_product;
        $this->customer = $this->order->user;
        $this->fullname = $this->customer->firstname . ' ' . $this->customer->lastname;
        foreach ($this->order_product as $key => $value)
        {
            $bien = \App\Models\Biens::where('id', $value->biens_id)->first();
            $bien->quantity = $value->quantity;
            $bien->price_per_token = $value->price_per_token;
            $bien->total_price = $value->total_price;
            array_push($this->biens, $bien);
        }
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return \App\Models\Order::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->paginate(8);
    }

    public function render()
    {
        return view('livewire.orders', ['data' => $this->read()]);
    }
}
