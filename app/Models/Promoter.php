<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Models\Restaurant;

class Promoter extends Model
{
    use HasFactory;
    public function person(){
        return $this->belongsTo(Person::class);
    }
    public function restaurant(){
        return $this->belongsToMany(Restaurant::class, 'restaurant_promoters');
    }
}
