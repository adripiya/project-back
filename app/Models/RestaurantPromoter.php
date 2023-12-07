<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Promoter;
use App\Models\Restaurant;

class RestaurantPromoter extends Model
{
    use HasFactory;
    protected $table = 'restaurant_promoters';

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function promoter(){
        return $this->belongsTo(Promoter::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'restaurant_promoters');
    }
}
