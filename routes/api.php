<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::resource('travels', 'TravelAPIController');

Route::resource('travels', 'TravelAPIController');

Route::resource('travels', 'TravelAPIController');

Route::resource('travels', 'TravelAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('travels', 'TravelAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('travels', 'TravelAPIController');

Route::resource('abouts', 'AboutAPIController');

Route::resource('types', 'TypeAPIController');

Route::resource('activities', 'ActivityAPIController');

Route::resource('images', 'ImageAPIController');

Route::resource('category_tours', 'CategoryTourAPIController');

Route::resource('times', 'TimeAPIController');

Route::resource('prices', 'PriceAPIController');

Route::resource('itineraries', 'ItineraryAPIController');

Route::resource('tours', 'TourAPIController');

Route::resource('places', 'PlaceAPIController');