<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BannerCategoriesController;
use App\Http\Controllers\Backend\BannersController;
use App\Http\Controllers\Backend\CountriesController;
use App\Http\Controllers\Backend\EpisodesController;
use App\Http\Controllers\Backend\GenresController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\MovieCategoriesController;
use App\Http\Controllers\Backend\MoviesController;
use App\Http\Controllers\Backend\NewsCategoriesController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\OrdersController;
use App\Http\Controllers\Backend\ServerLinksController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Frontend\IndexController;
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

// admin
Route::name('admin/')->prefix('admin')->group(function() {
    Route::post('login', [AdminController::class, 'login']);
    Route::get('login', [AdminController::class, 'index'])->name('login');

    // //Contact
    // Route::post('send-contact', 'FormContactsController@send_contact');
    
    Route::group(['middleware' => 'auth'], function() {
        Route::get('logout', [AdminController::class, 'logout']);

        //Home
        Route::get('', [HomeController::class, 'index']);

        //News
        Route::resource('news', NewsController::class);
        Route::get('news-search', [NewsController::class, 'search']);
        Route::get('unactivate-news-status/{id}', [NewsController::class, 'unactivate_news_status']);
        Route::get('activate-news-status/{id}', [NewsController::class, 'activate_news_status']);

        //News Categories
        Route::resource('news-categories', NewsCategoriesController::class);
        Route::get('news-category-search', [NewsCategoriesController::class, 'search']);
        Route::get('unactivate-news-categories-status/{id}', [NewsCategoriesController::class, 'unactivate_news_categories_status']);
        Route::get('activate-news-categories-status/{id}', [NewsCategoriesController::class, 'activate_news_categories_status']);
        Route::get('unactivate-news-categories-representative/{id}', [NewsCategoriesController::class, 'unactivate_news_categories_representative']);
        Route::get('activate-news-categories-representative/{id}', [NewsCategoriesController::class, 'activate_news_categories_representative']);

        //Banners
        Route::resource('banners', BannersController::class);
        Route::get('unactivate-banners-status/{id}', [BannersController::class, 'unactivate_banners_status']);
        Route::get('activate-banners-status/{id}', [BannersController::class, 'activate_banners_status']);

        //Banner Categories
        Route::resource('banner-categories', BannerCategoriesController::class); 

        //Movie Categories
        Route::resource('movie-categories', MovieCategoriesController::class);
        Route::get('movie-category-search', [MovieCategoriesController::class, 'search']);
        Route::get('unactivate-movie-categories-status/{id}', [MovieCategoriesController::class, 'unactivate_movie_categories_status']);
        Route::get('activate-movie-categories-status/{id}', [MovieCategoriesController::class, 'activate_movie_categories_status']);

        //Countries
        Route::resource('countries', CountriesController::class);
        Route::get('country-search', [CountriesController::class, 'search']);
        Route::get('unactivate-countries-status/{id}', [CountriesController::class, 'unactivate_countries_status']);
        Route::get('activate-countries-status/{id}', [CountriesController::class, 'activate_countries_status']);

        //Genres
        Route::resource('genres', GenresController::class);
        Route::get('genre-search', [GenresController::class, 'search']);
        Route::get('unactivate-genres-status/{id}', [GenresController::class, 'unactivate_genres_status']);
        Route::get('activate-genres-status/{id}', [GenresController::class, 'activate_genres_status']);

        //Servers
        Route::resource('server-links', ServerLinksController::class);
        Route::get('server-link-search', [ServerLinksController::class, 'search']);
        Route::get('unactivate-server-links-status/{id}', [ServerLinksController::class, 'unactivate_server_links_status']);
        Route::get('activate-server-links-status/{id}', [ServerLinksController::class, 'activate_server_links_status']);

        //Movies
        Route::resource('movies', MoviesController::class);
        Route::get('movie-search', [MoviesController::class, 'search']);
        Route::get('unactivate-movies-status/{id}', [MoviesController::class, 'unactivate_movies_status']);
        Route::get('activate-movies-status/{id}', [MoviesController::class, 'activate_movies_status']);

        //Episodes
        Route::resource('episodes', EpisodesController::class);
        Route::get('add-episodes/{movie_seo_name}', [EpisodesController::class, 'add']);
        Route::get('unactivate-episodes-status/{id}', [EpisodesController::class, 'unactivate_episodes_status']);
        Route::get('activate-episodes-status/{id}', [EpisodesController::class, 'activate_episodes_status']);

        //Services
        Route::resource('services', ServicesController::class);
        Route::get('unactivate-services-status/{id}', [ServicesController::class, 'unactivate_services_status']);
        Route::get('activate-services-status/{id}', [ServicesController::class, 'activate_services_status']);

        //Orders
        Route::resource('orders', OrdersController::class);
        Route::get('order-search', [OrdersController::class, 'search']);
        // Route::get('unactivate-services-status/{id}', [ServicesController::class, 'unactivate_services_status']);
        // Route::get('activate-services-status/{id}', [ServicesController::class, 'activate_services_status']);
    });

    
});

// user
Route::post('login', [IndexController::class, 'login']);
Route::get('/logout', [IndexController::class, 'logout']);
Route::post('signup', [IndexController::class, 'signup']);
Route::get('/customer-login', [IndexController::class, 'view_login'])->name('view_login');
Route::get('/customer-signup', [IndexController::class, 'view_signup'])->name('view_signup');
Route::get('/', [IndexController::class, 'home'])->name('homepage');

Route::get('/danh-muc/{seo_name}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{seo_name}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{seo_name}', [IndexController::class, 'country'])->name('country');
Route::get('/phim/{seo_name}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{seo_name}', [IndexController::class, 'watch'])->name('watch');
Route::get('/tap-phim/{seo_name}', [IndexController::class, 'episode'])->name('episode');

Route::get('/danh-muc-tin-tuc/{seo_name}', [IndexController::class, 'news_category'])->name('news_category');
Route::get('/tin-tuc/{seo_name}', [IndexController::class, 'news'])->name('news');

