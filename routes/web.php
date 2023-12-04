<?php

use App\Http\Controllers\Backend\CountriesController;
use App\Http\Controllers\Backend\EpisodesController;
use App\Http\Controllers\Backend\GenresController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\MovieCategoriesController;
use App\Http\Controllers\Backend\MoviesController;
use App\Http\Controllers\Backend\NewsCategoriesController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ServerLinksController;
use App\Http\Controllers\Backend\ServersController;
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

    //Movie Categories
    Route::resource('movie-categories', MovieCategoriesController::class);
    Route::get('unactivate-movie-categories-status/{id}', [MovieCategoriesController::class, 'unactivate_movie_categories_status']);
    Route::get('activate-movie-categories-status/{id}', [MovieCategoriesController::class, 'activate_movie_categories_status']);

    //Countries
    Route::resource('countries', CountriesController::class);
    Route::get('unactivate-countries-status/{id}', [CountriesController::class, 'unactivate_countries_status']);
    Route::get('activate-countries-status/{id}', [CountriesController::class, 'activate_countries_status']);

    //Genres
    Route::resource('genres', GenresController::class);
    Route::get('unactivate-genres-status/{id}', [GenresController::class, 'unactivate_genres_status']);
    Route::get('activate-genres-status/{id}', [GenresController::class, 'activate_genres_status']);

    //Servers
    Route::resource('server-links', ServerLinksController::class);
    Route::get('unactivate-server-links-status/{id}', [ServerLinksController::class, 'unactivate_server_links_status']);
    Route::get('activate-server-links-status/{id}', [ServerLinksController::class, 'activate_server_links_status']);

    //Movies
    Route::resource('movies', MoviesController::class);
    Route::get('unactivate-movies-status/{id}', [MoviesController::class, 'unactivate_movies_status']);
    Route::get('activate-movies-status/{id}', [MoviesController::class, 'activate_movies_status']);

    //Episodes
    Route::resource('episodes', EpisodesController::class);
    Route::get('unactivate-episodes-status/{id}', [EpisodesController::class, 'unactivate_episodes_status']);
    Route::get('activate-episodes-status/{id}', [EpisodesController::class, 'activate_episodes_status']);
});

Route::get('/', function () {
    return view('welcome');
});

