<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/loremipsum', 'LoremIpsumController@getIndex');
// Route::post('/loremipsum', 'LoremIpsumController@postIndex');

Route::controller('/loremipsum', 'LoremIpsumController');
Route::controller('/users', 'UserController');
Route::controller('/password', 'PasswordController');

if(App::environment('local')) {
    Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
};

// Route::get('/practice', function () {
// 	return 'practice';
// });