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


//get home page
Route::get('/', 'MainController@index')->name('main');

Auth::routes();

Route::get('/admin', ['uses' => 'Admin\HomeController@index', 'as' => 'home']);

ROute::post('/sendMail', 'MainController@sendMail');

Route::prefix('admin')->group(function(){

    /* login logout routes */
	Route::get('/login',  ['uses' => 'Auth\AdminLoginController@showLoginForm', 'as' => 'admin.login']);
	Route::post('/login', ['uses' => 'Auth\AdminLoginController@login', 'as' => 'admin.login.submit']);
	Route::get('/',       ['uses' => 'Admin\HomeController@index', 'as' => 'admin.dashboard']);
	Route::get('/logout', ['uses' => 'Auth\AdminLoginController@logout', 'as' => 'admin.logout']);

    /* slider routes */
	Route::group(['prefix' => 'slider'], function() {
        Route::get('/', ['uses' => 'Admin\SliderController@Index', 'as' => 'admin.slider.index']);
        Route::get('/add', 'Admin\SliderController@AddSlider');
        Route::post('/addsliderpost', 'Admin\SliderController@AddSliderPost');
        Route::get('/edit/{id}', 'Admin\SliderController@EditSlider');
        Route::get('/changesliderstatus/{id}', 'Admin\SliderController@ChangeSliderStatus');
        Route::get('/deleteslider/{id}', 'Admin\SliderController@DeleteSlider');
        Route::post('/editsliderpost', 'Admin\SliderController@EditSliderPost');
    });

    /* socials routes */
    Route::group(['prefix' => 'socials'], function() {
        Route::get('/', ['uses' => 'Admin\SocialsController@index', 'as' => 'admin.socials.index']);
        Route::post('/edit', 'Admin\SocialsController@EditSocial');
    });

    /* services routes */
    Route::group(['prefix' => 'services'], function() {
        Route::get('/', ['uses' => 'Admin\ServicesController@Index', 'as' => 'admin.services.index']);
        Route::get('/edit/{id}', 'Admin\ServicesController@EditService');
        Route::post('/editservicepost', 'Admin\ServicesController@EditServicePost');
    });

    /* subscribers routes */
    Route::get('/subscribers', ['uses' => 'Admin\SubscribersController@index', 'as' => 'admin.subscribers']);
});
