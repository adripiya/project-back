<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions = Direction::all();
        return response()->json($directions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $direction = new Direction();
        $direction->street = $request->street;
        $direction->number = $request->number;
        $direction->floor = $request->floor;
        $direction->postal_code_id = $request->postal_code_id;
        $direction->city_id = $request->city_id;
        $direction->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $direction
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Direction $direction)
    {
        $direction = Direction::find($direction->id);
        if(!$direction){
            $data = [
                'message' => "direction not found",
                'code' => 404,];
                return response()->json($data);
        }
        return response()->json($direction);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Direction $direction)
    {
        $direction->street = $request->street;
        $direction->number = $request->number;
        $direction->floor = $request->floor;
        $direction->postal_code_id = $request->postal_code_id;
        $direction->city_id = $request->city_id;
        $direction->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $direction
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Direction $direction)
    {
        $direction->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $direction
        ];
        return response()->json($direction);
    }
}
