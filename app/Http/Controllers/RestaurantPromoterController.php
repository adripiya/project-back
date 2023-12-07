<?php

namespace App\Http\Controllers;

use App\Models\RestaurantPromoter;
use Illuminate\Http\Request;

class RestaurantPromoterController extends Controller
{
    public function index()
    {
        //$restaurants = restaurantpromoter::all();
        $restaurants = RestaurantPromoter::with('restaurant', 'promoter')->get();
        return response()->json($restaurants);
    }

    public function show(RestaurantPromoter $restaurantPromoter)
    {
        $restaurantPromoter = RestaurantPromoter::with('restaurant', 'promoter')->find($restaurantPromoter->id);
        return response()->json($restaurantPromoter);
    }

}
