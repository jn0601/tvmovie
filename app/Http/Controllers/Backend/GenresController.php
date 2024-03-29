<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenresRequest;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class GenresController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Genre::orderBy('display_order', 'desc')->paginate($this->pagination);
        $url = 'admin-pages.genres.list_genres';

        $view = view($url)->with('data', $list);
        return view('admin_layout')->with($url, $view);
    }

    public function search(Request $request) 
    {
        $url = 'admin-pages.genres.list_genres';
        $data = $request->all();
        // không có data
        if ($data['name'] == '' && $data['status'] == '') {
            return Redirect::to('admin/genres');
        }
        // có data
        else {
            $list = Genre::orderBy('display_order', 'desc');
            if($data['name']) {
                $list = $list->where('name', 'like', '%' . $data['name'] . '%');
            } 
            if($data['status']) {
                $list = $list->where('status', $data['status']);
            }
            $list = $list->paginate($this->pagination);
        }
        //dd($data);
        $view = view($url)->with('data', $list)->with('search_value', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin-pages.genres.add_edit_genres';
        $data = '';
        return view($url)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenresRequest $request)
    {
        $data = $request->all();
        $item = new Genre();
        $item->name = $data['name'];
        $item->desc = $data['desc'] ? $data['desc'] : '';
        $item->seo_name = $data['seo_name'];

        $item->meta_title = $data['meta_title'] ? $data['meta_title'] : '';
        $item->meta_desc = $data['meta_desc'] ? $data['meta_desc'] : '';
        $item->meta_keyword = $data['meta_keyword'] ? $data['meta_keyword'] : '';

        $item->display_order = Genre::max('display_order') + 1;
        $item->status = $data['status'];
        $item->save();

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/genres');
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
        $url = 'admin-pages.genres.add_edit_genres';
        $data = Genre::where('id', $id)->first();
        $view = view($url)->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenresRequest $request, string $id)
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
        Genre::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/genres');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check_item = MovieGenre::where('genre_id', $id)->get()->first();
        if ($check_item) {
            Toastr::error('Thể loại có chứa phim', 'Thất bại');
        } else {
            Genre::where('id', $id)->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }
        return redirect()->back();
    }

    public function unactivate_genres_status($id)
    {
        Genre::where('id', $id)->update(['status' => 2]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_genres_status($id)
    {
        Genre::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
