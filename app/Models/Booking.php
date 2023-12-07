<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\State;
use App\Models\RestaurantPromoter;

class Booking extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function state(){
        return $this->hasMany(State::class);
    }

    public function restaurantPromoters()
    {
        return $this->belongsToMany(RestaurantPromoter::class, 'restaurant_promoters');
    }
}
