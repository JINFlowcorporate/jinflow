<?php

namespace App\Http\Livewire;

use App\Models\UserBien;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Holdings extends Component
{
    public $biens = [];

    public function mount()
    {
        $this->biens = Auth::user()->biens;

        foreach ($this->biens as $bien)
        {
            $user_biens = UserBien::where('user_id', Auth::id())->where('biens_id', $bien->id)->get();

            foreach ($user_biens as $user_bien)
            {
                if ($user_bien->biens_id === $bien->id)
                {
                    $bien->quantity += $user_bien->quantity;
                    $bien->price_per_token = $user_bien->price_per_token;
                    $bien->total_price += $user_bien->total_price;
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.holdings');
    }
}
