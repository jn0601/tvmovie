<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Episode;
use App\Models\EpisodeServer;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\MovieCountry;
use App\Models\MovieCustomer;
use App\Models\MovieGenre;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function view_login() {

        return view('pages.login.login');
    }

    public function view_signup() {

        return view('pages.login.signup');
    }

    public function view_account() {
        $get_id = Session::get('customer_id');
        $info = Customer::where('id', $get_id)->first();
        return view('pages.login.account')
        ->with('info', $info);
    }

    public function view_deposit() {

        return view('pages.transaction.deposit');
    }
    
    public function login(Request $request) {
        $username = $request->username;
        $password = md5($request->password);
        $result = Customer::where('username', $username)->where('password',$password)
        ->where('status', 1)->first();
        if($result){
            Session::put('customer_id', $result->id);
            Session::put('customer_name', $result->username);
            Session::put('balance', $result->balance);
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
            'username' => 'required|unique:customers',
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
            $customer->username = $data['username'];
            $customer->password = md5($data['password']);
            $customer->fullname = $data['fullname'];
            $customer->email = $data['email'];
            $customer->phone = $data['phone'];
            $customer->status = 1;
            $customer->balance = '0 VND';

            $customer->save();

            Session::put('customer_id', $customer->id);
            Session::put('customer_name', $customer->username);
            Session::put('balance', $customer->balance);
            Toastr::success('Tạo tài khoản thành công', 'Thành công');
            return Redirect::to('/');
        } else {
            return Redirect::to('/customer-signup');
        }
    }
    public function update_info(Request $request) {
        $dataRequest = $request->all();
        $get_id = Session::get('customer_id');
        $data_validate = $request->validate([
            'email' => 'required|email|unique:customers,email,'.$get_id,
            'phone' => 'required|unique:customers,phone,'.$get_id,

        ],
        [
            'email.unique' => 'Email đã tồn tại, vui lòng nhập email khác',
            'phone.unique' => 'Số điện thoại đã tồn tại, vui lòng nhập số khác',
        ]);
        
        $data = array();
        if ($data_validate) {
            $data['fullname'] = $dataRequest['fullname'];
            $data['email'] = $dataRequest['email'];
            $data['phone'] = $dataRequest['phone'];
        }
        if ($dataRequest['password']) {
            $check_old_password = Customer::where('id', $get_id)
            ->where('password', md5($request->old_password))->get('password')->first();
            if ($check_old_password && $check_old_password->password != md5($request->password)) {
                if ($request->password == $request->re_password) {
                    $data['password'] = md5($request->re_password);
                }
                else {
                    Toastr::error('Mật khẩu nhập lại không đúng', 'Thất bại');
                    return Redirect::to('/thong-tin-tai-khoan');
                }
            }
            else {
                Toastr::error('Mật khẩu cũ không đúng hoặc mật khẩu mới bị trùng', 'Thất bại');
                return Redirect::to('/thong-tin-tai-khoan');
            }
        }

        Customer::where('id', $get_id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('/');
        
    }

    public function logout() {
        Session::forget('customer_id');
        Session::forget('customer_name');
        Session::forget('balance');
        Toastr::success('Đăng xuất thành công','Thành công');

    	return Redirect::to('/');
    }

    public function payment(Request $request) {
        $data = $request->all();
        $movie_info = Movie::where('id', $data['movie_id'])->first();
        $customer_info = Customer::where('id', $data['customer_id'])->first();

        // Remove non-numeric characters from the string
        $moviePrice = preg_replace("/[^0-9]/", "", $movie_info->price);
        // Convert the string to an integer for comparison
        $moviePrice = (int) $moviePrice;

        // Remove non-numeric characters from the string
        $customerBalance = preg_replace("/[^0-9]/", "", $customer_info->balance);
        // Convert the string to an integer for comparison
        $customerBalance = (int) $customerBalance;


        if ($moviePrice > $customerBalance) {
            Toastr::error('Số dư không đủ', 'Thất bại');
            return redirect()->back();
        } else {
            $item = new MovieCustomer();
            $item->movie_id = $data['movie_id'];
            $item->customer_id = $data['customer_id'];
            $item->save();

            //update balance
            $balance = Customer::where('id', $data['customer_id'])->first();
            $temp = $customerBalance - $moviePrice;
            // Format the number with dots every three digits and add 'VND' at the end
            $formattedBalance = number_format($temp, 0, ',', '.') . ' VND';
            $balance->balance = $formattedBalance;
            $balance->save();
            Session::put('balance', $balance->balance);

            Toastr::success('Mua phim thành công', 'Thành công');
            return $this->movie($movie_info->seo_name);
        }
        
    }

    public function search(Request $request) {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();
        
        $url = 'pages.search';
        $data = $request->all();
        $movie_name = Movie::has('episode')->where('name', 'like', '%' . $data['name'] . '%')
        ->where('status', 1)
        ->orderBy('display_order', 'desc')
        ->get();
        $movie_org_name = Movie::has('episode')->where('org_name', 'like', '%' . $data['name'] . '%')
        ->where('status', 1)
        ->orderBy('display_order', 'desc')
        ->get();
        if(count($movie_name) > 0) {
            $movie_detail = $movie_name->paginate(12);
        } else {
            $movie_detail = $movie_org_name->paginate(12);
        }

    	return view($url)
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('data', $data)
        ->with('movie_detail', $movie_detail)
        ->with('news', $news);
    }

    public function home() {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();

        return view('pages.home')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('news', $news);
    }
    public function category($seo_name) {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();
        $get_category = MovieCategory::where('seo_name', $seo_name)->first();
        $category_detail = Movie::has('episode')->where('category_id', $get_category->id)->paginate(12);

        return view('pages.category')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('get_category', $get_category)
        ->with('category_detail', $category_detail)
        ->with('news', $news);
    }
    public function view_bought_movie() {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();

        $customer_id = Session::get('customer_id');
        $get_bought_movie = Movie::has('episode')->join('movie_customers', 'movie_customers.movie_id', '=', 'movies.id')
        ->where('movie_customers.customer_id', $customer_id)->paginate(12);
        // dd($get_bought_movie);

        return view('pages.bought_movie')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('get_bought_movie', $get_bought_movie)
        ->with('news', $news);
    }
    public function view_free_movie() {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();

        $get_free_movie = Movie::has('episode')
        ->where('price', "0 VND")->paginate(12);
        // dd($get_bought_movie);

        return view('pages.free_movie')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('get_free_movie', $get_free_movie)
        ->with('news', $news);
    }
    public function genre($seo_name) {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();
        $get_genre = Genre::where('seo_name', $seo_name)->first();
        $genre_detail = Movie::has('episode')->join('movie_genres', 'movies.id', '=', 'movie_genres.movie_id',)->where('movie_genres.genre_id', $get_genre->id)->paginate(12);
        //dd($genre_detail);
        return view('pages.genre')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('get_genre', $get_genre)
        ->with('genre_detail', $genre_detail)
        ->with('news', $news);
    }
    public function country($seo_name) {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();
        $get_country = Country::where('seo_name', $seo_name)->first();
        $country_detail = Movie::has('episode')->join('movie_countries', 'movies.id', '=', 'movie_countries.movie_id',)->where('movie_countries.country_id', $get_country->id)->paginate(12);

        return view('pages.country')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('get_country', $get_country)
        ->with('country_detail', $country_detail)
        ->with('news', $news);
    }
    public function movie($seo_name) {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();

        $movie_detail = Movie::has('episode')->where('seo_name', $seo_name)->where('status', 1)->first();
        $episode = Episode::with('movie')->where('movie_id', $movie_detail->id)->orderBy('episode', 'desc')->where('status', 1)->get();
        $first_ep = Episode::with('movie')->where('movie_id', $movie_detail->id)->orderBy('episode', 'asc')->where('status', 1)->first();
        $first_server = EpisodeServer::join('server_links', 'server_links.id', '=', 'episode_servers.server_id')
        ->where('episode_id', $first_ep->id)
        ->orderBy('episode_id', 'asc')
        ->first();
        
        $country_detail = MovieCountry::join('countries', 'countries.id', '=', 'movie_countries.country_id')
        ->where('movie_countries.movie_id', $movie_detail->id)->get();
        $genre_detail = MovieGenre::join('genres', 'genres.id', '=', 'movie_genres.genre_id',)
        ->where('movie_genres.movie_id', $movie_detail->id)->get();
        $category_detail = Movie::has('episode')->join('movie_categories', 'movie_categories.id', '=', 'movies.category_id')
        ->where('movies.seo_name', $movie_detail->seo_name)->first();
        $related = Movie::has('episode')->where('category_id', $movie_detail->category_id)->orderBy(DB::raw('RAND()'))->whereNotIn('seo_name', [$seo_name])->get();

        //check price
        $get_customer_id = Session::get('customer_id');
        if($get_customer_id) {
            $check_legit = MovieCustomer::where('movie_id', $movie_detail->id)
            ->where('customer_id', $get_customer_id)
            ->first();
            if ($check_legit) {
                $price = 'Đã mua';
            } else {
                $price = $movie_detail->price;
            }
        } else {
            $price = $movie_detail->price;
        }
        

        //update views movie
        // $view = Movie::has('episode')->where('seo_name', $seo_name)->first();
        // $view->count_view = $view->count_view + 1;
        // $view->save();

        return view('pages.movie')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('price', $price)
        ->with('movie_detail', $movie_detail)
        ->with('country_detail', $country_detail)
        ->with('genre_detail', $genre_detail)
        ->with('category_detail', $category_detail)
        ->with('episode', $episode)
        ->with('first_ep', $first_ep)
        ->with('first_server', $first_server)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('related', $related)
        ->with('news', $news);
    }
    
    public function watch($seo_name, $tap, $server) {
        $movie_detail = Movie::has('episode')->where('seo_name', $seo_name)->first();
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();

        $tap = $tap;
        $server = $server;
        
        $ep_detail = Episode::where('movie_id', $movie_detail->id)->where('seo_name', $tap)->first();
        $country_detail = MovieCountry::join('countries', 'countries.id', '=', 'movie_countries.country_id',)->where('movie_countries.movie_id', $movie_detail->id)->first();
        $genre_detail = MovieGenre::join('genres', 'genres.id', '=', 'movie_genres.genre_id',)->where('movie_genres.movie_id', $movie_detail->id)->first();
        $episode = Episode::where('movie_id', $movie_detail->id)->orderBy('episode', 'asc')->where('status', 1)->get();
        $list_servers = EpisodeServer::join('episodes', 'episodes.id', '=', 'episode_servers.episode_id')
        ->join('server_links', 'server_links.id', '=', 'episode_servers.server_id')
        ->where('episodes.movie_id', $movie_detail->id)
        ->where('episodes.seo_name', $tap)
        ->where('server_links.status', 1)
        ->get();
        $list_server_all = EpisodeServer::join('server_links', 'server_links.id', '=', 'episode_servers.server_id')
        ->orderBy('episode_id', 'asc')
        ->where('server_links.status', 1)
        // ->where('episode_servers.episode_id', 12)
        ->get();
        
        // lấy link
        $link_server = EpisodeServer::join('episodes', 'episodes.id', '=', 'episode_servers.episode_id')
        ->join('server_links', 'server_links.id', '=', 'episode_servers.server_id')
        ->where('episodes.movie_id', $movie_detail->id)
        ->where('episodes.seo_name', $tap)
        ->where('server_links.seo_name', $server)->first();
        $related = Movie::has('episode')->where('category_id', $movie_detail->category_id)->orderBy(DB::raw('RAND()'))->whereNotIn('seo_name', [$seo_name])->get();
        // dd($list_server_all);
        return view('pages.watch')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('movie', $movie)
        ->with('movie_detail', $movie_detail)
        ->with('country_detail', $country_detail)
        ->with('genre_detail', $genre_detail)
        ->with('ep_detail', $ep_detail)
        ->with('episode', $episode)
        ->with('list_servers', $list_servers)
        ->with('list_server_all', $list_server_all)
        ->with('tap', $tap)
        ->with('server', $server)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('link_server', $link_server)
        ->with('related', $related)
        ->with('news', $news);
        
    }
    public function episode($movie_seo_name, $seo_name) {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->get();
        $movie_detail = Movie::has('episode')->where('seo_name', $movie_seo_name)->first();
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
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('episode_link', $episode_link)
        ->with('news', $news);
    }

    public function tag($tag) {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();

        $tag = $tag;
        $movie = Movie::has('episode')->where('tags', 'LIKE', '%'.$tag.'%')->orderBy('display_order', 'desc')->paginate(12);

        return view('pages.tag')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('tag', $tag)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('news', $news);
    }

    public function year($year) {
        $sidebar = Movie::has('episode')->orderBy('display_order', 'desc')->where('status', 1)->take(10)->get();
        $footer = Banner::where('category_id', 1)->orderBy('display_order', 'asc')->where('status', 1)->take(3)->get();
        $category = MovieCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $genre = Genre::orderBy('display_order', 'desc')->where('status', 1)->get();
        $country = Country::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news_category = NewsCategory::orderBy('display_order', 'desc')->where('status', 1)->get();
        $news = News::orderBy('display_order', 'desc')->where('status', 1)->get();
        $episode = Episode::orderBy('episode', 'desc')->where('status', 1)->get();

        $year = $year;
        $movie = Movie::has('episode')->where('year', $year)->orderBy('display_order', 'desc')->paginate(12);

        return view('pages.year')
        ->with('category', $category)
        ->with('genre', $genre)
        ->with('country', $country)
        ->with('news_category', $news_category)
        ->with('year', $year)
        ->with('movie', $movie)
        ->with('episode', $episode)
        ->with('sidebar', $sidebar)
        ->with('footer', $footer)
        ->with('news', $news);
    }
}
