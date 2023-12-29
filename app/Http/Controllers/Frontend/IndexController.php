<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Customer;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;

class IndexController extends Controller
{
    public function view_login() {

        return view('pages.login.login');
    }

    public function view_signup() {

        return view('pages.login.signup');
    }
    
    public function login(Request $request) {
        $username = $request->username;
        $password = md5($request->password);
        $result = Customer::where('username', $username)->where('password',$password)->first();
        if($result){
            Session::put('customer_id', $result->id);
            Session::put('customer_name', $result->fullname);
            Toastr::success('Đăng nhập thành công','Thành công');
            return Redirect::to('/');
        }
        else{
            Toastr::error('Tên tài khoản hoặc mật khẩu không đúng, vui lòng thử lại', 'Thất bại');
            return Redirect::to('/customer-login');
        }
        Session::save();
    }

    public function signup(Request $request) {
        $data = $request->all();
        $data_validate = $request->validate([
            'username' => 'required|unique:customers|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|unique:customers|email',
            'phone' => 'required|unique:customers',

        ],
        [
            'username.unique' => 'Tên đăng nhập đã tồn tại, vui lòng nhập tên khác',
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
            'phone.unique' => 'Số điện thoại đã tồn tại, vui lòng nhập số khác',
        ]);

        if ($data_validate) {
            $customer = new Customer();

            $customer->role_id = 1;
            $customer->username = $data['username'];
            $customer->password = md5($data['password']);
            $customer->fullname = $data['fullname'];
            $customer->email = $data['email'];
            $customer->phone = $data['phone'];
            $customer->status = 1;
            $customer->time_expired = '0';

            $customer->save();

            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->fullname);
            Toastr::success('Tạo tài khoản thành công', 'Thành công');
            return Redirect::to('/');
        } else {
            return Redirect::to('/customer-signup');
        }
    }

    public function logout() {
        Session::forget('customer_id');
        Toastr::success('Đăng xuất thành công','Thành công');

    	return Redirect::to('/');
    }

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
        $get_category = MovieCategory::where('seo_name', $seo_name)->first();
        $category_detail = Movie::where('category_id', $get_category->id)->paginate(12);

        return view('pages.category')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('get_category', $get_category)
        ->with('category_detail', $category_detail)
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
        $get_genre = Genre::where('seo_name', $seo_name)->first();
        $genre_detail = Movie::join('movie_genres', 'movies.id', '=', 'movie_genres.movie_id',)->where('movie_genres.genre_id', $get_genre->id)->paginate(12);
        //dd($genre_detail);
        return view('pages.genre')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('get_genre', $get_genre)
        ->with('genre_detail', $genre_detail)
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
        $get_country = Country::where('seo_name', $seo_name)->first();
        $country_detail = Movie::join('movie_countries', 'movies.id', '=', 'movie_countries.movie_id',)->where('movie_countries.country_id', $get_country->id)->paginate(12);

        return view('pages.country')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('get_country', $get_country)
        ->with('country_detail', $country_detail)
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
        $country_detail = MovieCountry::join('countries', 'countries.id', '=', 'movie_countries.country_id',)
        ->where('movie_countries.movie_id', $movie_detail->id)->first();
        $genre_detail = MovieGenre::join('genres', 'genres.id', '=', 'movie_genres.genre_id',)
        ->where('movie_genres.movie_id', $movie_detail->id)->first();
        //dd($country_detail);

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
