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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function(){
    
    Route::get('/dashboard', 'Admin\AdminController@dashboard')->name('dashboard');

    Route::get('/profiles', 'Admin\AdminController@profiles')->name('profile');

    Route::prefix('resource')->name('resource.')->group(function(){
        Route::resources([
            'profiles' => ProfileController::class,
        ]);
    });
});

Route::prefix('CV')->name('CV.')->middleware(['auth'])->group(function(){
    
    Route::get('/templates-plain', 'CV\CVController@templates_plain')->name('templates_plain');

    // Route::get('/profiles', 'Admin\AdminController@profiles')->name('profile');

    Route::prefix('resource')->name('resource.')->group(function(){
        Route::resources([
            'profiles' => ProfileController::class,
        ]);
    });
});

// Route::get('/home', 'HomeController@index')->name('home');
