<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieCategoriesRequest;
use App\Models\Movie;
use App\Models\MovieCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class MovieCategoriesController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCategory = MovieCategory::orderBy('display_order', 'desc')->paginate($this->pagination);
        $url = 'admin-pages.movie-categories.list_movie_categories';

        $view = view($url)->with('data', $listCategory);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin-pages.movie-categories.add_edit_movie_categories';
        //$listCategory = $this->getCategories();
        $data = '';
        return view($url)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieCategoriesRequest $request)
    {
        $data = $request->all();
        $categories = new MovieCategory();
        $categories->name = $data['name'];
        $categories->desc = $data['desc'] ? $data['desc'] : '';
        $categories->seo_name = $data['seo_name'];

        $categories->meta_title = $data['meta_title'] ? $data['meta_title'] : '';
        $categories->meta_desc = $data['meta_desc'] ? $data['meta_desc'] : '';
        $categories->meta_keyword = $data['meta_keyword'] ? $data['meta_keyword'] : '';

        $categories->display_order = MovieCategory::max('display_order') + 1;
        $categories->status = $data['status'];
        $categories->save();

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/movie-categories');
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
        $url = 'admin-pages.movie-categories.add_edit_movie_categories';
        $data = MovieCategory::where('id', $id)->first();
        //$listCategory = $this->getCategories();
        $view = view($url)->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieCategoriesRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $data['name'] = $dataRequest['name'];
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';
        $data['seo_name'] = isset($dataRequest['seo_name']) ? $dataRequest['seo_name'] : '';

        $data['meta_title'] = isset($dataRequest['meta_title']) ? $dataRequest['meta_title'] : '';
        $data['meta_desc'] = isset($dataRequest['meta_desc']) ? $dataRequest['meta_desc'] : '';
        $data['meta_keyword'] = isset($dataRequest['meta_keyword']) ? $dataRequest['meta_keyword'] : '';

        $data['status'] = $dataRequest['status'];
        MovieCategory::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/movie-categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check_item = Movie::where('category_id', $id)->get()->first();
        if ($check_item) {
            Toastr::error('Danh mục có chứa phim', 'Thất bại');
        } else {
            MovieCategory::where('id', $id)->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }
        return redirect()->back();
    }

    public function unactivate_movie_categories_status($id)
    {
        MovieCategory::where('id', $id)->update(['status' => 0]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_movie_categories_status($id)
    {
        MovieCategory::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
