<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');

    Route::get('/profiles', 'Admin\AdminController@profiles')->name('profile');

    Route::get('/CV', 'Admin\AdminController@listCV')->name('daftar_cv');

    Route::get('/profile/{id_profile}', 'Admin\AdminController@listCVProfile')->name('daftar_cv_profile');

    Route::prefix('resource')->name('resource.')->group(function () {
        Route::resources([
            'profiles' => ProfileController::class,
            'cvs' => CvController::class
        ]);
    });
});

Route::prefix('CV')->name('CV.')->group(function () {

    Route::get('/first/{idcv}', 'CV\CVController@templates_first')->name('templates_first');

    Route::get('/second/{idcv}', 'CV\CVController@templates_second')->name('templates_second');

    // Route::get('/profiles', 'Admin\AdminController@profiles')->name('profile');

    // Route::prefix('resource')->name('resource.')->group(function(){
    //     Route::resources([
    //         'profiles' => ProfileController::class,
    //     ]);
    // });
});

// Route::get('/home', 'HomeController@index')->name('home');
