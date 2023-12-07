<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();
        //$states = State::with('booking')->get();
        return response()->json($states);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $state = new State();
        $state->state = $request->state;
        $state->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $state
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        $state = State::find($state->id);
        //$state = State::with('booking')->find($state->id);
        return response()->json($state);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $state->state = $request->state;
        $state->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $state
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $state
        ];
        return response()->json($data);
    }
}
