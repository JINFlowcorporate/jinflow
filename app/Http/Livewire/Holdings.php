<?php

namespace App\Http\Livewire;

use App\Models\UserBien;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Holdings extends Component
{
    public $biens;

    public function mount()
    {
        $this->biens = Auth::user()->biens;
    }

    public function render()
    {
        return view('livewire.holdings');
    }
}
