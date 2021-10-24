<?php

namespace App\Http\Livewire;

use App\Models\Biens;
use Livewire\Component;
use Livewire\WithPagination;

class NosBiens extends Component
{
    use WithPagination;

    public function render()
    {
        $biens = Biens::paginate(2);

        return view('livewire.nos-biens', ['biens' => $biens]);
    }
}
