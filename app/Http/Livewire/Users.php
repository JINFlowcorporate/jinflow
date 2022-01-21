<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class Users extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $city;
    public $state;
    public $zipcode;
    public $referral_rate;
    public $us_citizen;

    /**
     * Put your custom public properties here!
     */

    /**
     * The validation rules
     *
     * @return string[]
     */
    public function rules()
    {
        return [
            'username' => ['nullable', Rule::unique('users', 'username')->ignore($this->modelId)],
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->modelId)],
            'password' => 'required|max:255',
            'phone' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'state' => 'nullable|max:255',
            'zipcode' => 'nullable|max:255',
            'us_citizen' => 'nullable|boolean'
        ];
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = User::find($this->modelId);
        // Assign the variables here
        $this->username = $data->username;
        $this->firstname = $data->firstname;
        $this->lastname = $data->lastname;
        $this->email = $data->email;
        $this->password = $data->password;
        $this->phone = $data->phone;
        $this->address = $data->address;
        $this->city = $data->city;
        $this->state = $data->state;
        $this->zipcode = $data->zipcode;
        $this->referral_rate = $data->referral_rate;
        $this->us_citizen = (boolean)$data->us_citizen;
    }

    /**
     * The data for the model mapped
     * in this component.
     *
     * @return array
     */
    public function modelData()
    {
        return [
            'username' => $this->username,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
            'referral_rate' => $this->referral_rate,
            'us_citizen' => (boolean)$this->us_citizen,
            'referrer_code' => Str::random(10)
        ];
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        User::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return User::orderBy('created_at', 'DESC')->paginate(5);
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
        $this->modalFormVisible = false;
    }

    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        User::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();
    }

    /**
     * Shows the create modal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in update mode.
     *
     * @param  mixed $id
     * @return void
     */
    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->modalFormVisible = true;
        $this->modelId = $id;
        $this->loadModel();
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteShowModal($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function toggleUserActive($id)
    {
        $user = User::where('id', $id)->first();
        $user->is_active = !$user->is_active;
        $user->save();
    }

    public function render()
    {
        return view('livewire.users', [
            'data' => $this->read()
        ]);
    }
}
