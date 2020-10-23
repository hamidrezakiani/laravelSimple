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
Route::namespace('App\Http\Controllers')->group(function(){
    Route::post('auth/register','Auth\RegisterController@register');
    Route::post('auth/login','Auth\LoginController@login');
    Route::middleware('auth:api')->group(function(){
       Route::post('auth/logout','Auth\LogoutController@logout');
       Route::get('profile/get','UserController@getProfile');
       Route::post('profile/update','UserController@updateProfile');
       Route::group(['prefix' => 'tweet'],function(){
           Route::post('submit','TweetController@submit');
           Route::post('delete/{id}','TweetController@delete');
           Route::get('list','TweetController@list');
           Route::get('likes','LikeController@likes');
           Route::post('like','LikeController@like');
           Route::post('unLike','LikeController@unLick');
       });
       Route::get('wall','WallController@wall');
    });

});


