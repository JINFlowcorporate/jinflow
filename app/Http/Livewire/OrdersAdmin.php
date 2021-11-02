<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class OrdersAdmin extends Component
{
    public $modalDetailsVisible = false;
    public $order;
    public $fullname;
    public $order_product;
    public $biens = [];
    public $customer;

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Order::orderBy('created_at', 'DESC')->paginate(8);
    }

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

    public function render()
    {
        return view('livewire.orders-admin', [
            'data' => $this->read()
        ]);
    }
}
