<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, Billable;

    public function biens()
    {
        return $this->belongsToMany(Biens::class, UserBien::class, 'user_id', 'biens_id', 'id', 'id')->distinct();
    }

    public function user_biens()
    {
        return $this->hasMany(UserBien::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'is_admin',
        'is_agent',
        'phone',
        'username',
        'birthdate',
        'us_citizen',
        'referrer_code',
        'referred_by',
        'referral_rate',
        'address',
        'city',
        'billing_country',
        'state',
        'zipcode',
        'email',
        'password',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function referralLogs()
    {
        return $this->hasMany(ReferralLog::class)->orderByDesc('created_at');
    }

    public function referralCount(){
        return User::where('referred_by', $this->referrer_code)->count();
    }
    public function getNetRentPerMonth(){
        $rent = 0;
        $userBiens = $this->userBiens()->where('active', 1)->get();
        foreach ($userBiens as $userBien){
            $rent+= $userBien->biens->net_rent_month * $userBien->quantity;
        }
        return $rent;
    }
    public function userBiens()
    {
        return $this->hasMany(UserBien::class);
    }
}
