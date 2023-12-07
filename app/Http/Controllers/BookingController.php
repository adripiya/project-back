<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\RestaurantPromoter;

class BookingController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = Booking::with('user')->get();
        //$booking = $this->appendVehicleDriverData($booking);
        return response()->json($booking);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $booking = new Booking();
        $booking->initial_date = $request->initial_date;
        $booking->end_date = $request->end_date;
        $booking->totalPeople = $request->totalPeople;
        $booking->totalPrice = $request->totalPrice;
        $booking->state_id = $request->state_id;
        $booking->user_id = $request->user_id;
        $booking->restaurant_promoter_id = $request->restaurant_promoter_id;
        $booking->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $booking
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $booking = Booking::with('user')->find($booking->id);

        return response()->json($booking);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->initial_date = $request->initial_date;
        $booking->end_date = $request->end_date;
        $booking->totalPeople = $request->totalPeople;
        $booking->totalPrice = $request->totalPrice;
        $booking->state_id = $request->state_id;
        $booking->user_id = $request->user_id;
        $booking->restaurant_promoter_id = $request->restaurant_promoter_id;
        $booking->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $booking
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        $data = [
            'message' => "success",
            'code' => 204,
            'data' => $booking
        ];
        return response()->json($data);
    }

    public function newBooking(Request $request)
    {
        // Obtenenemos el id de vehicle y driver del request
        $restaurantId = $request->restaurant_id;
        $promoterId = $request->promoter_id;

        // Vemos si ya existe la relación en vehicles_drivers
        $restaurantPromoter = RestaurantPromoter::where('restaurant_id', $restaurantId)
            ->where('promoter_id', $promoterId)
            ->first();

        // Si no existe, la creamos
        if (!$restaurantPromoter) {
            $restaurantPromoter = new RestaurantPromoter();
            $restaurantPromoter->restaurant_id = $restaurantId;
            $restaurantPromoter->promoter_id = $promoterId;
            $restaurantPromoter->save();
        }
        // Creamos la reserva
        $booking = new Booking();
        $booking->initial_date = $request->initial_date;
        $booking->end_date = $request->end_date;
        $booking->totalPeople = $request->totalPeople;
        $booking->totalPrice = $request->totalPrice;
        $booking->state_id = $request->state_id;
        $booking->user_id = $request->user_id;
        $booking->restaurant_promoter_id = $restaurantPromoter->id;
        $booking->save();
        $data = [
            'message' => "success",
            'code' => 201,
            'data' => $booking
        ];

        $data = [
            'message' => 'success',
            'code' => 201,
            'data' => $booking,
        ];

        return response()->json($data);
    }
}
