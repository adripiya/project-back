<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $city = new City();
        $city->city = $request->city;
        $city->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $city
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return response()->json($city);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $city->city = $request->city;
        $city->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $city
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $city
        ];
        return response()->json($data);
    }
}
