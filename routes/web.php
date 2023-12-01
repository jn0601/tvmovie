<?php

use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\NewsCategoriesController;
use App\Http\Controllers\Backend\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::name('admin/')->prefix('admin')->group(function() {
    // Route::post('login', 'LoginController@login');
    // Route::get('login', 'LoginController@index')->name('login');

    // //Contact
    // Route::post('send-contact', 'FormContactsController@send_contact');
    
    // Route::group(['middleware' => 'auth'], function() {
    //     Route::get('', 'PagesController@index');
    //     Route::get('logout', 'LoginController@logout');
    
    // });

    //Home
    Route::get('', [HomeController::class, 'index']);

    //News
    Route::resource('news', NewsController::class);
    Route::get('unactivate-news-status/{id}', [NewsController::class, 'unactivate_news_status']);
    Route::get('activate-news-status/{id}', [NewsController::class, 'activate_news_status']);

    //News Categories
    Route::resource('news-categories', NewsCategoriesController::class);
    Route::get('unactivate-news-categories-status/{id}', [NewsCategoriesController::class, 'unactivate_news_categories_status']);
    Route::get('activate-news-categories-status/{id}', [NewsCategoriesController::class, 'activate_news_categories_status']);
    Route::get('unactivate-news-categories-representative/{id}', [NewsCategoriesController::class, 'unactivate_news_categories_representative']);
    Route::get('activate-news-categories-representative/{id}', [NewsCategoriesController::class, 'activate_news_categories_representative']);
});

Route::get('/', function () {
    return view('welcome');
});

