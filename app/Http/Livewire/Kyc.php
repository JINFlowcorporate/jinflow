<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
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
            $data['passport_kyc'] = Storage::disk('public')->put('profile/' . Auth::id() . '/passport', $this->passport_kyc);

            if (file_exists(public_path('storage/' . Auth::user()->passport_kyc)))
            {
                unlink(public_path('storage/' . Auth::user()->passport_kyc));
            }

            $this->passport_file = URL::asset('storage/' . $data['passport_kyc']);
        }

        if (!empty($this->driver_kyc))
        {
            $data['driver_kyc'] = Storage::disk('public')->put('profile/' . Auth::id() . '/driver', $this->driver_kyc);

            if (file_exists(public_path('storage/' . Auth::user()->driver_kyc)))
            {
                unlink(public_path('storage/' . Auth::user()->driver_kyc));
            }

            $this->driver_file = URL::asset('storage/' . $data['driver_kyc']);
        }

        if (!empty($this->proof_address_kyc))
        {
            $data['proof_address_kyc'] = Storage::disk('public')->put('profile/' . Auth::id() . '/proof', $this->proof_address_kyc);

            if (file_exists(public_path('storage/' . Auth::user()->proof_address_kyc)))
            {
                unlink(public_path('storage/' . Auth::user()->proof_address_kyc));
            }

            $this->proof_file = URL::asset('storage/' . $data['proof_address_kyc']);
        }

        if (!empty($data))
        {
            User::where('id', Auth::user()->id)->update($data);
        }
    }

    public function mount()
    {
        $this->passport_file = Auth::user()->passport_kyc && file_exists(public_path('storage/' . Auth::user()->passport_kyc)) ? URL::asset('storage/' . Auth::user()->passport_kyc) : '';
        $this->driver_file = Auth::user()->driver_kyc && file_exists(public_path('storage/' . Auth::user()->driver_kyc)) ? URL::asset('storage/' . Auth::user()->driver_kyc) : '';
        $this->proof_file = Auth::user()->proof_address_kyc && file_exists(public_path('storage/' . Auth::user()->proof_address_kyc)) ? URL::asset('storage/' . Auth::user()->proof_address_kyc) : '';
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
