<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Kyc extends Component
{
    use WithFileUploads;

    public $modelId;
    public $passport_kyc;
    public $driver_kyc;
    public $proof_address_kyc;
    public $passport_file;
    public $driver_file;
    public $proof_file;

    public function rules(): array
    {
        return [
            'passport_kyc' => 'nullable',
            'driver_kyc' => 'nullable',
            'proof_address_kyc' => 'nullable'
        ];
    }

    public function send()
    {
        $this->validate();

        $data = [];

        if (!empty($this->passport_kyc))
        {
            cloudinary()->destroy('public_id', User::where('id', Auth::user()->id)->pluck('public_id_passport_kyc')[0]);
            $passport = $this->passport_kyc->storeOnCloudinaryAs('Users/' . Auth::user()->lastname . ' ' . Auth::user()->firstname, 'Passport');
            $data['passport_kyc'] = $passport->getSecurePath();
            $data['public_id_passport_kyc'] = $passport->getPublicId();
        }

        if (!empty($this->driver_kyc))
        {
            cloudinary()->destroy('public_id', User::where('id', Auth::user()->id)->pluck('public_id_driver_kyc')[0]);
            $driver = $this->driver_kyc->storeOnCloudinaryAs('Users/' . Auth::user()->lastname . ' ' . Auth::user()->firstname, "Driver's license");
            $data['driver_kyc'] = $driver->getSecurePath();
            $data['public_id_driver_kyc'] = $driver->getPublicId();
        }

        if (!empty($this->proof_address_kyc))
        {
            cloudinary()->destroy('public_id', User::where('id', Auth::user()->id)->pluck('public_id_proof_address_kyc')[0]);
            $proof = $this->proof_address_kyc->storeOnCloudinaryAs('Users/' . Auth::user()->lastname . ' ' . Auth::user()->firstname, "Proof of address");
            $data['proof_address_kyc'] = $proof->getSecurePath();
            $data['public_id_proof_address_kyc'] = $proof->getPublicId();
        }

        if (!empty($data))
        {
            User::where('id', Auth::user()->id)->update($data);
        }
    }

    public function mount()
    {
        $this->passport_file = Auth::user()->passport_kyc;
        $this->driver_file = Auth::user()->driver_kyc;
        $this->proof_file = Auth::user()->proof_address_kyc;
    }

    public function render()
    {
        return view('livewire.kyc');
    }
}
