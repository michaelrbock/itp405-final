<?php

use App\User;
use App\Models\Job;

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

Route::get('/', 'WelcomeController@index');

Route::get('/home', 'HomeController@index');
Route::get('/blogger', 'BloggerController@index');
Route::get('/advertiser', 'AdvertiserController@index');

Route::post('/jobs', 'JobController@addJob');
Route::get('/jobs/{id}', 'JobController@detail');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
