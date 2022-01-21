<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBien extends Model
{
    use HasFactory;


    protected $fillable = [
        'quantity',
        'price_per_token',
        'total_price',
        'active',
        'deleted_at'
    ];
    protected $guarded = [];

    protected $casts = [
        'active' => 'boolean'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function biens()
    {
        return $this->belongsTo(Biens::class);
    }
}
