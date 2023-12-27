<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MoviesRequest;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\MovieCountry;
use App\Models\MovieGenre;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class MoviesController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = 'admin-pages.movies.list_movies';
        $list = Movie::orderBy('display_order', 'desc')->paginate($this->pagination);
        $listCategory = MovieCategory::orderBy('id', 'desc')->get();
        $mainGenre = Genre::orderBy('display_order', 'desc')->get();
        $listGenre = MovieGenre::orderBy('id', 'desc')->get();

        $view = view($url)
        ->with('data', $list)
        ->with('dataCategory', $listCategory)
        ->with('mainGenre', $mainGenre)
        ->with('listGenre', $listGenre);
        return view('admin_layout')->with($url, $view);
    }

    public function search(Request $request) 
    {
        $url = 'admin-pages.movies.list_movies';
        $data = $request->all();
        // không có data
        if ($data['name'] == '' && $data['status'] == '') {
            return Redirect::to('admin/movies');
        }
        // có data
        else {
            $listCategory = MovieCategory::orderBy('display_order', 'desc')->get();
            $mainGenre = Genre::orderBy('display_order', 'desc')->get();
            $listGenre = MovieGenre::orderBy('id', 'desc')->get();
            // search status
            if ($data['name'] == '' && $data['status'] != '') {
                $list = Movie::where('status', $data['status'])
                ->orderBy('display_order', 'desc')
                ->paginate($this->pagination);
            } 
            else {
                // search status và name
                if ($data['status']) {
                    $list = Movie::where('name', 'like', '%' . $data['name'] . '%')
                    ->where('status', $data['status'])
                    ->orderBy('display_order', 'desc')
                    ->paginate($this->pagination);
                } 
                // search name
                else {
                    $list = Movie::where('name', 'like', '%' . $data['name'] . '%')
                    ->orderBy('display_order', 'desc')
                    ->paginate($this->pagination);
                }
            }
        }
        //dd($data);
        $view = view($url)->with('data', $list)
        ->with('search_value', $data)
        ->with('dataCategory', $listCategory)
        ->with('mainGenre', $mainGenre)
        ->with('listGenre', $listGenre);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin-pages.movies.add_edit_movies';
        $listCategory = MovieCategory::orderBy('display_order', 'desc')->get();
        $listGenre = Genre::orderBy('display_order', 'desc')->get();
        $listCountry = Country::orderBy('display_order', 'desc')->get();
        $data = '';
        return view($url)
        ->with('listCategory', $listCategory)
        ->with('listGenre', $listGenre)
        ->with('listCountry', $listCountry)
        ->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MoviesRequest $request)
    {
        $data = $request->all();
        $item = new Movie();
        $item->name = $data['name'];
        $item->org_name = $data['org_name'] ? $data['org_name'] : '';
        $item->desc = $data['desc'] ? $data['desc'] : '';
        $item->content = $data['content'] ? $data['content'] : '';
        $item->seo_name = $data['seo_name'];

        $get_image = request('img');
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('public/backend/uploads/movies', $new_image);
        $item->image = $new_image;

        
        $item->tags = $data['tags'] ? $data['tags'] : '';
        $item->meta_title = $data['meta_title'] ? $data['meta_title'] : '';
        $item->meta_desc = $data['meta_desc'] ? $data['meta_desc'] : '';
        $item->meta_keyword = $data['meta_keyword'] ? $data['meta_keyword'] : '';

        $item->link_trailer = $data['link_trailer'] ? $data['link_trailer'] : '';
        $item->category_id = $data['category_id'];
        $item->status = $data['status'];
        $item->options = isset($data['options']) ? implode(',', $data['options']) : '';
        $item->count_view = 0;
        $item->date_created = date("Y-m-d H:i:s");
        $item->date_updated = date("Y-m-d H:i:s");
        $item->display_order = Movie::max('display_order') + 1;
        $item->save();

        // save vào bảng phụ
        $genre = $request->input('genre_id');
        $country = $request->input('country_id');
        if ($genre) {
            foreach ($genre as $key => $value) {
                $movie_genre = new MovieGenre();
                $movie_genre->movie_id = $item->id;
                $movie_genre->genre_id = $value;
                $movie_genre->save();
            }
        }
        if ($country) {
            foreach ($country as $key => $value) {
                $movie_country = new MovieCountry();
                $movie_country->movie_id = $item->id;
                $movie_country->country_id = $value;
                $movie_country->save();
            }
        }

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/movies');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = 'admin-pages.movies.add_edit_movies';
        $data = Movie::where('id', $id)->first();
        $listCategory = MovieCategory::orderBy('display_order', 'desc')->get();
        $listGenre = Genre::orderBy('display_order', 'desc')->get();
        $subGenre = MovieGenre::join('genres', 'genres.id', '=', 'movie_genres.genre_id')->where('movie_genres.movie_id', $id)->get();
        $subCountry = MovieCountry::join('countries', 'countries.id', '=', 'movie_countries.country_id')->where('movie_countries.movie_id', $id)->get();
        $listCountry = Country::orderBy('display_order', 'desc')->get();
        $view = view($url)
        ->with('data', $data)
        ->with('listCategory', $listCategory)
        ->with('listCountry', $listCountry)
        ->with('subGenre', $subGenre)
        ->with('subCountry', $subCountry)
        ->with('listGenre', $listGenre);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MoviesRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $getImage = $request->file('img');
        $data['name'] = $dataRequest['name'];
        $data['org_name'] = $dataRequest['org_name'] ? $dataRequest['org_name'] : '';
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';
        $data['content'] = isset($dataRequest['content']) ? $dataRequest['content'] : '';
        $data['seo_name'] = isset($dataRequest['seo_name']) ? $dataRequest['seo_name'] : '';

        $data['tags'] = isset($dataRequest['tags']) ? $dataRequest['tags'] : '';
        $data['meta_title'] = isset($dataRequest['meta_title']) ? $dataRequest['meta_title'] : '';
        $data['meta_desc'] = isset($dataRequest['meta_desc']) ? $dataRequest['meta_desc'] : '';
        $data['meta_keyword'] = isset($dataRequest['meta_keyword']) ? $dataRequest['meta_keyword'] : '';

        $data['link_trailer'] = isset($dataRequest['link_trailer']) ? $dataRequest['link_trailer'] : '';
        $data['options'] = isset($dataRequest['options']) ? implode(',', $dataRequest['options']) : '';
        $data['category_id'] = $dataRequest['category_id'];
        $data['status'] = $dataRequest['status'];
        $data['date_updated'] = date("Y-m-d H:i:s");

        if ($getImage) {
            $old_image = Movie::where('id', $id)->get('image')->first();
            unlink('public/backend/uploads/movies/'.$old_image->image);

            $getNameImage = $getImage->getClientOriginalName();
            $nameImage = current(explode('.', $getNameImage));
            $newImage = $nameImage . rand(0, 99) . '.' . $getImage->getClientOriginalExtension();
            $getImage->move('public/backend/uploads/movies', $newImage);
            $data['image'] = $newImage;
        }
        //dd($id);
        Movie::where('id', $id)->update($data);

        //update bảng phụ
        $genre = $request->input('genre_id');
        $country = $request->input('country_id');
        if ($genre) {
            MovieGenre::where('movie_id', $id)->delete();
            foreach ($genre as $key => $value) {
                $movie_genre = new MovieGenre();
                $movie_genre->movie_id = $id;
                $movie_genre->genre_id = $value;
                $movie_genre->save();
            }
        }
        if ($country) {
            MovieCountry::where('movie_id', $id)->delete();
            foreach ($country as $key => $value) {
                $movie_country = new MovieCountry();
                $movie_country->movie_id = $id;
                $movie_country->country_id = $value;
                $movie_country->save();
            }
        }

        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/movies');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check_item = Episode::where('movie_id', $id)->get()->first();
        if ($check_item) {
            Toastr::error('Phim có chứa tập phim', 'Thất bại');
        } else {
            $get_image = Movie::where('id', $id)->get('image')->first();
            $path = base_path('public/backend/uploads/movies');
            $exists = file_exists($path.'/'.$get_image->image);
            if ($exists) {
                unlink('public/backend/uploads/movies/'.$get_image->image);
            }
            Movie::where('id', $id)->delete();
            MovieCountry::where('movie_id', $id)->delete();
            MovieGenre::where('movie_id', $id)->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }
        
        return redirect()->back();
    }

    //bật tắt trạng thái
    public function unactivate_movies_status($id)
    {
        Movie::where('id', $id)->update(['status' => 0]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_movies_status($id)
    {
        Movie::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
