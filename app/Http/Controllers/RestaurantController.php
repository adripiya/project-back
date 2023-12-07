<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$restaurants = Restaurant::with('promoter', 'direction')->get();
        $restaurants = Restaurant::with( 'direction','promoter')->get();
        return response()->json($restaurants);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant();
        $restaurant->license = $request->license;
        $restaurant->name = $request->name;
        $restaurant->waiters = $request->waiters;
        $restaurant->maxPeople = $request->maxPeople;
        $restaurant->minPeople = $request->minPeople;
        $restaurant->pricePerPerson = $request->pricePerPerson;
        $restaurant->direction_id = $request->direction_id;
        $restaurant->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $restaurant
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        $restaurant = Restaurant::with('direction','promoter')->find($restaurant->id);

        if(!$restaurant){
            $data = [
                'message' => "restaurant not found",
                'code' => 404,];
                return response()->json($data);
        }
        return response()->json($restaurant);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->license = $request->license;
        $restaurant->name = $request->name;
        $restaurant->waiters = $request->waiters;
        $restaurant->maxPeople = $request->maxPeople;
        $restaurant->minPeople = $request->minPeople;
        $restaurant->pricePerPerson = $request->pricePerPerson;
        $restaurant->direction_id = $request->direction_id;
        $restaurant->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $restaurant
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $restaurant
        ];
        return response()->json($data);
    }

    public function promoters(Request $request){
        $restaurant = Restaurant::find($request->restaurant_id);
        $promoter = $restaurant->promoter;
        $data = [
            'message' => 'Promoters fetched succesfully',
            'code' => 201,
            'data' => $promoter
        ];
        return response()->json($data);
    }
}
