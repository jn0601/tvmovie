<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerCategoriesRequest;
use App\Models\Banner;
use App\Models\BannerCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class BannerCategoriesController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = BannerCategory::orderBy('display_order', 'desc')->paginate($this->pagination);
        $url = 'admin-pages.banner-categories.list_banner_categories';

        $view = view($url)->with('data', $list);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin-pages.banner-categories.add_edit_banner_categories';
        $data = '';
        return view($url)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerCategoriesRequest $request)
    {
        $data = $request->all();
        $categories = new BannerCategory();
        $categories->name = $data['name'];
        $categories->desc = $data['desc'] ? $data['desc'] : '';
        $categories->seo_name = $data['seo_name'];

        $categories->display_order = BannerCategory::max('display_order') + 1;
        $categories->save();

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/banner-categories');
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
        $url = 'admin-pages.banner-categories.add_edit_banner_categories';
        $data = BannerCategory::where('id', $id)->first();
        $view = view($url)->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerCategoriesRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $data['name'] = $dataRequest['name'];
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';
        $data['seo_name'] = isset($dataRequest['seo_name']) ? $dataRequest['seo_name'] : '';

        BannerCategory::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/banner-categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check_item = Banner::where('category_id', $id)->get()->first();
        if ($check_item) {
            Toastr::error('Danh mục có chứa banner', 'Thất bại');
        } else {
            BannerCategory::where('id', $id)->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }
        return redirect()->back();
    }
}
