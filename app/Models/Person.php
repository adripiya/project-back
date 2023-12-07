<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direction;
use App\Models\Promoter;

class Person extends Model
{
    use HasFactory;
    public function direction(){
        return $this->belongsTo(Direction::class);
    }
    public function user(){
        return $this->hasMany(Promoter::class);
    }
}
