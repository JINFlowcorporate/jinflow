<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['bien_id', 'user_id', 'quantity', 'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function biens()
    {
        return $this->belongsToMany(Biens::class, OrderProduct::class, 'order_id', 'biens_id', 'id', 'id');
    }
}
