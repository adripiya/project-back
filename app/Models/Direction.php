<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostalCode;
use App\Models\City;
use App\Models\Restaurant;

class Direction extends Model
{
    use HasFactory;
    public function postalCode(){
        return $this->hasMany(PostalCode::class);
    }
    public function city(){
        return $this->hasMany(City::class);
    }

    /*public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }*/
}
