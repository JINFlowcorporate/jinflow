<?php

namespace App\Http\Livewire;

use App\Models\RequestRecover;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $modalVisible = false;
    public $to_recover;
    public $profile_photo_path;
    public $fullname;
    public $referrer_code;
    public $invested;
    public $rent;
    public $can_recover;

    public function rules()
    {
        return [
            'to_recover' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'to_recover.required' => __('dashboard.error'),
            'to_recover.integer' => __('dashboard.error-int')
        ];
    }

    public function create()
    {
        $this->validate();
        $request_recover = new RequestRecover();
        $request_recover->user_id = Auth::id();
        $request_recover->amount = $this->to_recover;
        $request_recover->save();
        User::where('id', Auth::id())->decrement('can_recover', $this->to_recover);
        $this->can_recover = User::with('id', Auth::id())->pluck('can_recover')->first();
        $this->modalVisible = false;
        $this->to_recover = '';
    }

    public function mount()
    {
        $this->profile_photo_path = Auth::user()->profile_photo_path ? Storage::url(Auth::user()->profile_photo_path) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png';
        $this->fullname = Auth::user()->lastname . ' ' . Auth::user()->firstname;
        $this->referrer_code = Auth::user()->referrer_code;
        $this->invested = number_format(Auth::user()->invested, 2, ',', ' ');
        $this->rent = number_format(Auth::user()->rent, 2, ',', ' ');
        $this->can_recover = Auth::user()->can_recover;
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        auth('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function read()
    {
        return RequestRecover::orderBy('created_at', 'DESC')->paginate(3);
    }

    public function render()
    {
        return view('livewire.dashboard', ['data' => $this->read()])->extends('user.layout.layout')->section('content');
    }
}
