<?php

namespace App\Http\Controllers;

use App\Models\PostalCode;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postal_codes = PostalCode::all();
        //$postal_codes = PostalCode::with('direction')->get();
        return response()->json($postal_codes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $postal_code = new PostalCode();
        $postal_code->postal_code = $request->postal_code;
        $postal_code->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $postal_code
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostalCode $postal_code)
    {
        $postal_code = PostalCode::find($postal_code->id);
        //$postal_code = PostalCode::with('direction')->find($postal_code->id);
        return response()->json($postal_code);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostalCode $postalCode)
    {
        $postalCode->postal_code = $request->postal_code;
        $postalCode->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $postalCode
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostalCode $postal_code)
    {
        $postal_code->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $postal_code
        ];
        return response()->json($data);
    }
}
