<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$people = Person::all();
        $people = Person::with('direction')->get();
        return response()->json($people);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = new Person();
        $person->name = $request->name;
        $person->lastName = $request->lastName;
        $person->nif = $request->nif;
        $person->direction_id = $request->direction_id;
        $person->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $person
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //$person = Person::with('direction', 'user', 'driver')->find($person->id);
        $person = Person::with('direction')->find($person->id);
                return response()->json($person);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $person->name = $request->name;
        $person->lastName = $request->lastName;
        $person->nif = $request->nif;
        $person->direction_id = $request->direction_id;
        $person->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $person
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $person
        ];
        return response()->json($data);
    }
}
