<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;



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

Route::group(['prefix' => 'admin'], function () {   
    Voyager::routes(); 

    Route::get('deleteforever/{table}/{keyvalue}', 'App\Http\Controllers\Cdbcontroller@deleteforever')->name('deleteforever');
    Route::get('deletetrash/{table}/{check}', 'App\Http\Controllers\Cdbcontroller@deletetrash')->name('deletetrash');
    Route::get('/report-dashboard', 'App\Http\Controllers\Cdbcontroller@reportdashboard'); // Route hiển thị dashboard report
    Route::get('/report', 'App\Http\Controllers\Cdbcontroller@getreport')->name('report'); // Route đưa dữ liệu lên view report
});
