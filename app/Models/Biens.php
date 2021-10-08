<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biens extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['description'];
    protected $fillable = ['name', 'slug', 'nb_beds', 'type', 'nb_bathroom', 'zipcode', 'status', 'state', 'city', 'square_feet', 'rent_start_date', 'price', 'total_tokens', 'tokens_price', 'expected_yield', 'gross_rent_year', 'gross_rent_month', 'property_management', 'jinflow_tax', 'property_tax', 'insurance', 'utilities', 'net_rent_year', 'net_rent_month', 'yield_token'];
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
