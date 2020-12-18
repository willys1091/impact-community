<?php

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

Route::get('/', 'PageController@home')->name('home');
Route::get('/watch', 'PageController@watch')->name('watch');
Route::get('/watch/{url}', 'PageController@watch_detail')->name('watch_detail');
Route::get('/series/{url}', 'PageController@series')->name('series');
Route::get('/series/watch/{url}', 'PageController@series_detail')->name('series_detail');
Route::get('/city', 'PageController@city')->name('city');
Route::get('/city/{url}', 'PageController@city_detail')->name('city_detail');
Route::get('/church', 'PageController@church')->name('church');
Route::get('/church/{url}', 'PageController@church_detail')->name('church_detail');

Route::get('/care', 'PageController@care')->name('care');
Route::get('/care/firerelief', 'PageController@firerelief')->name('firerelief');
Route::get('/contact', 'PageController@contact_us')->name('contact_us');
Route::get('/update', 'PageController@update')->name('update');
Route::get('/update/{url}', 'PageController@update_filter')->name('update_filter');
Route::get('/content/{url}', 'PageController@content')->name('content');
Route::get('/recruitment', 'PageController@recruitment')->name('recruitment');
Route::get('/recruitment/{url}', 'PageController@recruitment_detail')->name('recruitment_detail');
Route::post('/recruitment/{url}', 'PageController@recruitment_apply')->name('recruitment_apply');

Route::prefix('admin')->group(function(){
	Route::get('login','AuthPanelAdmin@getLogin')->middleware('guest');
	Route::post('login','AuthPanelAdmin@AuthAdmin');
	Route::group(['middleware' => 'AdminRedirectNotAuthenticated'], function () {
        Route::resource('schedule', 'SchedulesController');
        Route::resource('admin', 'AdminsController');

        Route::get('/', ['as' => 'index', 'uses' => 'AuthPanelAdmin@show_admin_dashboard']);
        Route::get('/edit_account', ['as' => 'edit_account', 'uses' => 'AdminsController@edit_account']);
        Route::post('/edit_account', ['as' => 'edit_account_post', 'uses' => 'AdminsController@edit_account_post']);
        Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthPanelAdmin@OutAdmin']);

        Route::get('file', 'FileManagerController@index');
        Route::post('file/store','FileManagerController@proses_upload');
        Route::get('file/upload', ['as' => 'file.create', 'uses' => 'FileManagerController@upload']);
        Route::post('file/edit/{id}', ['as' => 'file.edit', 'uses' => 'FileManagerController@proses_edit']);
        Route::post('file/ck_upload', 'FileManagerController@uploadImage');

        Route::resource('watchvideo', 'WatchVideosController');
        Route::resource('series', 'seriesController');
        Route::resource('/categorycontent', 'CategoryContentsController');
        Route::resource('content', 'BlogController');
        Route::resource('section', 'SectionController');
    });
});
