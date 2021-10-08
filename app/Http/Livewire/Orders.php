<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Orders extends Component
{
    use WithPagination;

    public $modalDetailsVisible = false;
    public $modelId;
    public $biens;

    public function loadModel()
    {
        $data = \App\Models\Order::find($this->modelId);
        $this->biens = $data->biens;
    }

    public function detailShowModal($id)
    {
        $this->modalDetailsVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    public function delete()
    {
        dd('delete');
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return \App\Models\Order::orderBy('created_at', 'DESC')->paginate(8);
    }

    public function render()
    {
        return view('livewire.orders', ['data' => $this->read()]);
    }
}
