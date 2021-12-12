<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biens extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['description', 'about'];
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('id', 'ASC');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
