<?php

namespace App\Http\Livewire;

use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountDetails extends Component
{
    use WithFileUploads;

    public $modelId;
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $state;
    public $zipcode;
    public $us_citizen;
    public $profile_photo_path;

    /**
     * The validation rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => ['nullable', Rule::unique('users', 'username')->ignore($this->modelId)],
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->modelId)],
            'phone' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'state' => 'nullable|max:255',
            'zipcode' => 'nullable|numeric|max:255',
            'us_citizen' => 'nullable|boolean',
            'profile_photo_path' => 'nullable|file'
        ];
    }

    /**
     * The update function
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        User::find($this->modelId)->update($this->modelData());
    }

    public function modelData()
    {
        $fileUploaded = $this->profile_photo_path->storeOnCloudinaryAs('Profile');

        return [
            'username' => $this->username,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
            'us_citizen' => $this->us_citizen,
            'profile_photo_path' => $fileUploaded->getSecurePath()
        ];
    }

    public function mount()
    {
        $this->modelId = Auth::user()->id;
        $this->username = Auth::user()->username;
        $this->firstname = Auth::user()->firstname;
        $this->lastname = Auth::user()->lastname;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
        $this->address = Auth::user()->address;
        $this->city = Auth::user()->city;
        $this->state = Auth::user()->state;
        $this->zipcode = Auth::user()->zipcode;
        $this->us_citizen = Auth::user()->us_citizen;
        $this->profile_photo_path = Auth::user()->profile_photo_path;
    }

    public function render()
    {
        return view('livewire.account-details');
    }
}
