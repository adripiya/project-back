<?php

namespace App\Http\Controllers;

use App\Models\Promoter;
use Illuminate\Http\Request;

class PromoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promoters = Promoter::with( 'person', 'restaurant')->get();
        return response()->json($promoters);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $promoter = new Promoter();
        $promoter->email = $request->email;
        $promoter->phoneNumber = $request->phoneNumber;
        $promoter->person_id = $request->person_id;
        $promoter->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $promoter
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promoter $promoter)
    {
        $promoter = Promoter::with('person', 'restaurant')->find($promoter->id);
        return response()->json($promoter);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promoter $promoter)
    {
        $promoter->email = $request->email;
        $promoter->phoneNumber = $request->phoneNumber;
        $promoter->person_id = $request->person_id;
        $promoter->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $promoter
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promoter $promoter)
    {
        $promoter->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $promoter
        ];
        return response()->json($data);
    }

    public function attach(Request $request){
        $promoter = Promoter::find($request->promoter_id);
        $promoter->restaurant()->attach($request->restaurant_id);
        $data = [
            'message' => 'Vehicle succesfully attached',
            'code' => 201,
            'data' => $promoter
        ];
        return response()->json($data);
    }

    public function detach(Request $request){
        $promoter = Promoter::find($request->promoter_id);
        $promoter->restaurant()->detach($request->restaurant_id);
        $data = [
            'message' => 'Vehicle succesfully detached',
            'code' => 204,
            'data' => $promoter
        ];
        return response()->json($data);
    }
}
