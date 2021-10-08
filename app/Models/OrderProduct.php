<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'bien_id', 'quantity', 'price_per_token', 'total_price'];

    public function bien(){
        return $this->belongsTo(\App\Http\Livewire\Biens::class, 'biens_id');
    }
}
