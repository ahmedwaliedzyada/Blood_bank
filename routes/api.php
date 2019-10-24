<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');
        Route::post('reset-password', 'AuthController@resetPassword');
        Route::post('new-password', 'AuthController@newpassword');


        Route::group(['middleware' => 'auth:api'], function () {
            Route::post('toggle-favourite', 'MainController@toggleFavourites');
            Route::post('profile-edit', 'MainController@profileEdit');
            Route::get('notification_setting', 'MainController@notification_setting');
            Route::post('update-setting', 'MainController@update_notification_settings');
            Route::get('favourites', 'MainController@favourites');
            Route::post('donation-request-create', 'MainController@donationRequest');
            Route::post('search-by-category', 'MainController@searchCategory');
            Route::get('governorates', 'MainController@governorates');
            Route::get('cities', 'MainController@cities');
            Route::post('post-details', 'MainController@postDetails');
            Route::post('contact-us', 'MainController@contactUs');
            Route::get('settings', 'MainController@settings');
            Route::get('posts', 'MainController@posts');
            Route::get('categories', 'MainController@categories');
            Route::get('donations', 'MainController@donations');
            Route::post('donation-details', 'MainController@donationDetails');
            Route::post('registerToken', 'AuthController@registerToken');
            Route::post('removeToken', 'AuthController@removeToken');
            Route::get('notifications', 'MainController@notifications');

        });
    });
