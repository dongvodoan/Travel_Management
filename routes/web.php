<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'Frontend\HomeTravelController@index');

Route::resource('home-travel', 'Frontend\HomeTravelController');

Route::resource('tours-travel', 'Frontend\TourController');

Route::get('tour-category/{category}', ['as' => 'tours-travel.filter', 'uses' => 'Frontend\TourController@filter']);

Route::resource('things-to-do', 'Frontend\ActivityController');

Route::get('tour-activity-type/{type}', ['as' => 'activities.filter', 'uses' => 'Frontend\ActivityController@filter']);

Route::resource('travel-us', 'Frontend\TravelUsController');

Route::resource('about-us', 'Frontend\AboutUsController');

Route::get('/contacts', ['as' => 'contacts.index', 'uses' => 'Frontend\ContactController@index']);

Route::post('/contacts', ['as' => 'contacts.send', 'uses' => 'Frontend\ContactController@send']);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Auth::routes();

Route::get('/home', 'Backend\HomeController@index');

Route::resource('travels', 'Backend\TravelController');

Route::resource('abouts', 'Backend\AboutController');

Route::resource('types', 'Backend\TypeController');

Route::resource('activities', 'Backend\ActivityController');

Route::resource('images', 'Backend\ImageController');

Route::resource('categoryTours', 'Backend\CategoryTourController');

Route::resource('times', 'Backend\TimeController');

Route::resource('prices', 'Backend\PriceController');

Route::resource('itineraries', 'Backend\ItineraryController');

Route::resource('tours', 'Backend\TourController');

Route::resource('places', 'Backend\PlaceController');