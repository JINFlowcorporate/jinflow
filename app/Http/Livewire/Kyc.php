<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use function PHPUnit\Framework\exactly;

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
            //  cloudinary()->destroy('public_id', User::where('id', Auth::user()->id)->pluck('public_id_passport_kyc')[0]);
            //  $passport = $this->passport_kyc->storeOnCloudinaryAs('Users/' . Auth::user()->lastname . ' ' . Auth::user()->firstname, 'Passport');
            $data['passport_kyc'] = Storage::putFile('public/profile/' . Auth::id() . '/passport', $this->passport_kyc);

            if (Storage::exists(Auth::user()->passport_kyc))
            {
                Storage::delete(Auth::user()->passport_kyc);
            }

            $this->passport_file = $data['passport_kyc'];
            //  $data['public_id_passport_kyc'] = $passport->getPublicId();
        }

        if (!empty($this->driver_kyc))
        {
            //  cloudinary()->destroy('public_id', User::where('id', Auth::user()->id)->pluck('public_id_driver_kyc')[0]);
            //  $driver = $this->driver_kyc->storeOnCloudinaryAs('Users/' . Auth::user()->lastname . ' ' . Auth::user()->firstname, "Driver's license");
            $data['driver_kyc'] = Storage::putFile('public/profile/' . Auth::id() . '/driver', $this->driver_kyc);

            if (Storage::exists(Auth::user()->driver_kyc))
            {
                Storage::delete(Auth::user()->driver_kyc);
            }

            $this->driver_file = $data['driver_kyc'];
            //  $data['public_id_driver_kyc'] = $driver->getPublicId();
        }

        if (!empty($this->proof_address_kyc))
        {
            //  cloudinary()->destroy('public_id', User::where('id', Auth::user()->id)->pluck('public_id_proof_address_kyc')[0]);
            //  $proof = $this->proof_address_kyc->storeOnCloudinaryAs('Users/' . Auth::user()->lastname . ' ' . Auth::user()->firstname, "Proof of address");
            $data['proof_address_kyc'] = Storage::putFile('public/profile/' . Auth::id() . '/proof', $this->proof_address_kyc);

            if (Storage::exists(Auth::user()->proof_address_kyc))
            {
                Storage::delete(Auth::user()->proof_address_kyc);
            }

            $this->proof_file = $data['proof_address_kyc'];
            //  $data['public_id_proof_address_kyc'] = $proof->getPublicId();
        }

        if (!empty($data))
        {
            User::where('id', Auth::user()->id)->update($data);
        }
    }

    public function mount()
    {
        $this->passport_file = Storage::exists(Auth::user()->passport_kyc) ? Storage::url(Auth::user()->passport_kyc) : '';
        $this->driver_file = Storage::exists(Auth::user()->driver_kyc) ? Storage::url(Auth::user()->driver_kyc) : '';
        $this->proof_file = Storage::exists(Auth::user()->proof_address_kyc) ? Storage::url(Auth::user()->proof_address_kyc) : '';
    }

    public function deleteFile($file, $kyc)
    {
        if (Storage::exists(Auth::user()[$file]))
        {
            Storage::delete(Auth::user()[$file]);
            $this->$kyc = '';
        }
    }

    public function render()
    {
        return view('livewire.kyc');
    }
}
