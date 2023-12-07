<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direction;

class City extends Model
{
    use HasFactory;
    public function direction(){
        return $this->belongsTo(Direction::class);
    }
}
