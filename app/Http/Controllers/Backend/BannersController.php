<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannersRequest;
use App\Models\Banner;
use App\Models\BannerCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class BannersController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = 'admin-pages.banners.list_banners';
        $list = Banner::orderBy('display_order', 'desc')->paginate($this->pagination);
        $listCategory = BannerCategory::orderBy('display_order', 'desc')->get();

        $view = view($url)->with('data', $list)->with('dataCategory', $listCategory);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin-pages.banners.add_edit_banners';
        $listCategory = BannerCategory::orderBy('display_order', 'desc')->get();
        $data = '';
        return view($url)->with('listCategory', $listCategory)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannersRequest $request)
    {
        $data = $request->all();
        $item = new Banner();
        $item->name = $data['name'];
        $item->desc = $data['desc'] ? $data['desc'] : '';
        $item->content = $data['content'] ? $data['content'] : '';
        $item->seo_name = $data['seo_name'];

        $get_image = request('img');
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('public/backend/uploads/banners', $new_image);
        $item->image = $new_image;

        $item->link = $data['link'] ? $data['link'] : '';
        $item->category_id = $data['category_id'];
        $item->status = $data['status'];
        $item->display_order = Banner::max('display_order') + 1;
        $item->save();

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/banners');
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
        $url = 'admin-pages.banners.add_edit_banners';
        $data = Banner::where('id', $id)->first();
        $listCategory = BannerCategory::orderBy('display_order', 'desc')->get();
        $view = view($url)
        ->with('data', $data)
        ->with('listCategory', $listCategory);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannersRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $getImage = $request->file('img');
        $data['name'] = $dataRequest['name'];
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';
        $data['content'] = isset($dataRequest['content']) ? $dataRequest['content'] : '';
        $data['seo_name'] = isset($dataRequest['seo_name']) ? $dataRequest['seo_name'] : '';

        $data['link'] = isset($dataRequest['link']) ? $dataRequest['link'] : '';
        $data['category_id'] = $dataRequest['category_id'];
        $data['status'] = $dataRequest['status'];

        if ($getImage) {
            $old_image = Banner::where('id', $id)->get('image')->first();
            unlink('public/backend/uploads/banners/'.$old_image->image);

            $getNameImage = $getImage->getClientOriginalName();
            $nameImage = current(explode('.', $getNameImage));
            $newImage = $nameImage . rand(0, 99) . '.' . $getImage->getClientOriginalExtension();
            $getImage->move('public/backend/uploads/banners', $newImage);
            $data['image'] = $newImage;
        }
        Banner::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/banners');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $get_image = Banner::where('id', $id)->get('image')->first();
        $path = base_path('public/backend/uploads/banners');
        $exists = file_exists($path.'/'.$get_image->image);
        if ($exists) {
            unlink('public/backend/uploads/banners/'.$get_image->image);
        }
        Banner::where('id', $id)->delete();
        Toastr::success('Xóa thành công', 'Thành công');
        return redirect()->back();
    }

    //bật tắt trạng thái
    public function unactivate_banners_status($id)
    {
        Banner::where('id', $id)->update(['status' => 0]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_banners_status($id)
    {
        Banner::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
