<?php

// Display query for debugging
// DB::listen(function($query){var_dump($query->sql);});

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::get('/rants', 'RantController@index')->name('home');
    Route::post('/rants', 'RantController@store');
    Route::patch('/rants/{rant}/edit', 'RantController@edit');
    Route::delete('/rants/{rant}/delete', 'RantController@delete');

    Route::post('/profiles/{user:username}/follow', 'FollowsController@store');


    Route::post('/rants/{rant}/like', 'RantLikesController@store');
    Route::delete('/rants/{rant}/like', 'RantLikesController@destroy');



    Route::get('/profiles/{user:username}/edit', 'ProfilesController@edit');
    // Route::get('/profiles/{user:name}/edit', 'ProfilesController@edit')->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', 'ProfilesController@update');
    Route::get('/explore', 'ExploreController@index');
});

Route::get('/profiles/{user:username}', 'ProfilesController@show')->name('profile');




Auth::routes();
