<?php

namespace App\Http\Livewire;

use App\Models\RequestRecover;
use Livewire\Component;

class DashboardAdmin extends Component
{
    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return RequestRecover::orderBy('created_at', 'DESC')->paginate(5);
    }

    public function validateRequest($id)
    {
        RequestRecover::where('id', $id)->update(['is_validate' => 1]);
    }

    public function render()
    {
        return view('livewire.dashboard-admin', ['data' => $this->read()]);
    }
}
