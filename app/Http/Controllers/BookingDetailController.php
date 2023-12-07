<?php

namespace App\Http\Controllers;

use App\Models\BookingDetail;
use Illuminate\Http\Request;

class BookingDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookingDetails = BookingDetail::with('booking')->get();
        return response()->json($bookingDetails);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookingDetail = new BookingDetail();
        $bookingDetail->details = $request->details;
        $bookingDetail->booking_id = $request->booking_id;
        $bookingDetail->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $bookingDetail
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookingDetail $bookingDetail)
    {
        $bookingDetail = BookingDetail::with('booking')->find($bookingDetail->id);
        return response()->json($bookingDetail);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookingDetail $bookingDetail)
    {
        $bookingDetail->details = $request->details;
        $bookingDetail->booking_id = $request->booking_id;
        $bookingDetail->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $bookingDetail
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingDetail $bookingDetail)
    {
        $bookingDetail->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $bookingDetail
        ];
        return response()->json($data);
    }
}
