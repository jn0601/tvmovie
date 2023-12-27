<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Episode;
use App\Models\EpisodeServer;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\MovieCountry;
use App\Models\MovieGenre;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home() {
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();

        return view('pages.home')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('news', $news);
    }
    public function category($seo_name) {
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();

        return view('pages.category')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('news', $news);
    }
    public function genre($seo_name) {
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();

        return view('pages.genre')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('news', $news);
    }
    public function country($seo_name) {
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();

        return view('pages.country')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('news', $news);
    }
    public function movie($seo_name) {
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();
        $movie_detail = Movie::where('seo_name', $seo_name)->first();
        $country_detail = MovieCountry::join('countries', 'countries.id', '=', 'movie_countries.country_id',)->where('movie_countries.movie_id', $movie_detail->id)->get();
        $genre_detail = MovieGenre::join('genres', 'genres.id', '=', 'movie_genres.genre_id',)->where('movie_genres.movie_id', $movie_detail->id)->get();

        return view('pages.movie')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('movie_detail', $movie_detail)
        ->with('country_detail', $country_detail)
        ->with('genre_detail', $genre_detail)
        ->with('episode', $episode)
        ->with('news', $news);
    }
    public function watch($seo_name) {
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie_detail = Movie::where('seo_name', $seo_name)->first();
        $country_detail = MovieCountry::join('countries', 'countries.id', '=', 'movie_countries.country_id',)->where('movie_countries.movie_id', $movie_detail->id)->first();
        $genre_detail = MovieGenre::join('genres', 'genres.id', '=', 'movie_genres.genre_id',)->where('movie_genres.movie_id', $movie_detail->id)->first();
        $episode = Episode::orderBy('episode', 'asc')->where('movie_id', $movie_detail->id)->where('status', 1)->get();
        $episode_link = EpisodeServer::join('episodes', 'episodes.id', '=', 'episode_servers.episode_id')->where('episodes.movie_id', $movie_detail->id)
        ->orderBy('episode_servers.id', 'asc')->first();
        //dd($episode_link);

        return view('pages.watch')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('movie_detail', $movie_detail)
        ->with('country_detail', $country_detail)
        ->with('genre_detail', $genre_detail)
        ->with('episode', $episode)
        ->with('episode_link', $episode_link)
        ->with('news', $news);
    }
    public function episode($movie_seo_name, $seo_name) {
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie_detail = Movie::where('seo_name', $movie_seo_name)->first();
        $country_detail = MovieCountry::join('countries', 'countries.id', '=', 'movie_countries.country_id')->where('movie_countries.movie_id', $movie_detail->id)->first();
        $genre_detail = MovieGenre::join('genres', 'genres.id', '=', 'movie_genres.genre_id')->where('movie_genres.movie_id', $movie_detail->id)->first();
        $episode = Episode::orderBy('episode', 'asc')->where('movie_id', $movie_detail->id)->where('status', 1)->get();
        $episode_link = EpisodeServer::join('episodes', 'episodes.id', '=', 'episode_servers.episode_id')->where('episodes.seo_name', $seo_name)->get();
        
        return view('pages.episode')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('movie_detail', $movie_detail)
        ->with('country_detail', $country_detail)
        ->with('genre_detail', $genre_detail)
        ->with('episode', $episode)
        ->with('episode_link', $episode_link)
        ->with('news', $news);
    }
}
