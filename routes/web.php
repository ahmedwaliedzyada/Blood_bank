<?php

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
//
//Route::get('home', function ()
//{
////    dd(\App\Models\Governorate::get());
//    return view('layouts.app');
//});

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('home', 'HomeController@index');
Route::Resource('governorate','GovernorateController');
Route::Resource('city','CityController');
Route::Resource('post','PostController');
Route::Resource('category','CategoryController');

Route::get('active/{id}' , 'ClientController@active');
Route::get('disactive/{id}' , 'ClientController@disactive');
Route::delete('delete{id}','ClientController@destroy');
Route::get('client','ClientController@client');
Route::get('setting','HomeController@setting');
Route::Resource('contact','ContactController');
Route::get('getchangepassword','UserController@getChangePassword');
Route::post('changepassword','UserController@changePassword')->name('changepassword');
Route::Resource('role','RoleController');
Route::Resource('user','UserController');
Route::Resource('d-requests','DoRequestController');


//
//

Route::group(['middleware' => ['web'] ,'namespace' => 'client' , 'prefix' => 'blood_bank'], function () {
    Route::get('get_sign_up', 'WebController@signUp');
    Route::post('register', 'WebController@register');
    Route::get('get_login', 'WebController@login');
    Route::post('login', 'WebController@clientLogin');
    Route::get('home', 'WebController@index')->name('home');
    Route::get('contact_us', 'WebController@contactUs')->name('contactUs');
    Route::get('about_us', 'WebController@aboutUs')->name('aboutUs');
    Route::get('who_we_are', 'WebController@whoWeAre')->name('whoWeAre');
    Route::get('requests', 'WebController@requests')->name('requests');
    Route::get('logout', 'WebController@logout');

    Route::group(['middleware' => 'auth:client'], function () {
        Route::get('donate/{id}', 'WebController@donationDetails')->name('donate');
//        Route::get('donation_details', 'WebController@donationDetails')->('');
    });

});

//Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
