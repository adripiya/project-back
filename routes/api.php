<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login','App\Http\Controllers\AuthController@login');
Route::post('/register','App\Http\Controllers\AuthController@register');
//Todas las llamadas menos el login y el register van a requerir que estemos logados
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
    //directions
    Route::get('/directions','App\Http\Controllers\DirectionController@index');
    Route::post('/directions','App\Http\Controllers\DirectionController@store');
    Route::get('/directions/{direction}','App\Http\Controllers\DirectionController@show');
    Route::put('/directions/{direction}','App\Http\Controllers\DirectionController@update');
    Route::delete('/directions/{direction}','App\Http\Controllers\DirectionController@destroy');

    //cities
    Route::get('/cities','App\Http\Controllers\CityController@index');
    Route::post('/cities','App\Http\Controllers\CityController@store');
    Route::get('/cities/{city}','App\Http\Controllers\CityController@show');
    Route::put('/cities/{city}','App\Http\Controllers\CityController@update');
    Route::delete('/cities/{city}','App\Http\Controllers\CityController@destroy');

    //postalCodes
    Route::get('/postalCodes','App\Http\Controllers\PostalCodeController@index');
    Route::post('/postalCodes','App\Http\Controllers\PostalCodeController@store');
    Route::get('/postalCodes/{postal_code}','App\Http\Controllers\PostalCodeController@show');
    Route::put('/postalCodes/{postal_code}','App\Http\Controllers\PostalCodeController@update');
    Route::delete('/postalCodes/{postal_code}','App\Http\Controllers\PostalCodeController@destroy');

    //states
    Route::get('/states','App\Http\Controllers\StateController@index');
    Route::post('/states','App\Http\Controllers\StateController@store');
    Route::get('/states/{state}','App\Http\Controllers\StateController@show');
    Route::put('/states/{state}','App\Http\Controllers\StateController@update');
    Route::delete('/states/{state}','App\Http\Controllers\StateController@destroy');

    //Restaurant
    Route::get('/restaurants','App\Http\Controllers\RestaurantController@index');
    Route::post('/restaurants','App\Http\Controllers\RestaurantController@store');
    Route::get('/restaurants/{restaurant}','App\Http\Controllers\RestaurantController@show');
    Route::put('/restaurants/{restaurant}','App\Http\Controllers\RestaurantController@update');
    Route::delete('/restaurants/{restaurant}','App\Http\Controllers\RestaurantController@destroy');

    //people
    Route::get('/people','App\Http\Controllers\PersonController@index');
    Route::post('/people','App\Http\Controllers\PersonController@store');
    Route::get('/people/{person}','App\Http\Controllers\PersonController@show');
    Route::put('/people/{person}','App\Http\Controllers\PersonController@update');
    Route::delete('/people/{person}','App\Http\Controllers\PersonController@destroy');

    //promoter
    Route::get('/promoter','App\Http\Controllers\PromoterController@index');
    Route::post('/promoter','App\Http\Controllers\PromoterController@store');
    Route::get('/promoter/{promoter}','App\Http\Controllers\PromoterController@show');
    Route::put('/promoter/{promoter}','App\Http\Controllers\PromoterController@update');
    Route::delete('/promoter/{promoter}','App\Http\Controllers\PromoterController@destroy');

    //attach & dettach n:m
    Route::post('promoter/restaurant','App\Http\Controllers\PromoterController@attach');
    Route::post('promoter/restaurant/detach','App\Http\Controllers\PromoterController@detach');

    Route::get('/restaurantsPromoters','App\Http\Controllers\RestaurantPromoterController@index');
    Route::get('/restaurantsPromoters/{restaurantPromoter}','App\Http\Controllers\RestaurantPromoterController@show');

    //fetch data of promoters in a restaurants
    Route::post('/restaurants/promoters','App\Http\Controllers\RestaurantController@promoters');

    //users
    Route::get('/users','App\Http\Controllers\UserController@index');
    Route::post('/users','App\Http\Controllers\UserController@store');
    Route::get('/users/{user}','App\Http\Controllers\UserController@show');
    Route::put('/users/{user}','App\Http\Controllers\UserController@update');
    Route::delete('/users/{user}','App\Http\Controllers\UserController@destroy');
    Route::post('/users/createUser','App\Http\Controllers\UserController@createUser');

    //bookings
    Route::get('/bookings','App\Http\Controllers\BookingController@index');
    Route::post('/bookings','App\Http\Controllers\BookingController@store');
    Route::get('/bookings/{booking}','App\Http\Controllers\BookingController@show');
    Route::put('/bookings/{booking}','App\Http\Controllers\BookingController@update');
    Route::delete('/bookings/{booking}','App\Http\Controllers\BookingController@destroy');
    Route::post('/bookings/newBooking','App\Http\Controllers\BookingController@newBooking');

    //bookingDetails
    Route::get('/bookingDetails','App\Http\Controllers\BookingDetailController@index');
    Route::post('/bookingDetails','App\Http\Controllers\BookingDetailController@store');
    Route::get('/bookingDetails/{bookingDetail}','App\Http\Controllers\BookingDetailController@show');
    Route::put('/bookingDetails/{bookingDetail}','App\Http\Controllers\BookingDetailController@update');
    Route::delete('/bookingDetails/{bookingDetail}','App\Http\Controllers\BookingDetailController@destroy');
});


