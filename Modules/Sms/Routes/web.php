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

use Illuminate\Support\Facades\Route;

Route::prefix('sms')->group(function () {
    Route::get('/', 'SmsController@index')->name('sms::get.sms');
    Route::post('/', 'SmsController@StoreSendSms')->name('sms::post.sms');
    Route::get('/setting', 'SettingController@index')->name('sms::get.setting');
    Route::post('/setting', 'SettingController@update')->name('sms::post.setting');
});
