<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    use HasFactory;

    protected $fillable = [ 'amount', 'object_id', 'type', 'status', 'rate',"user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
