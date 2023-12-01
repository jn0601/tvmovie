<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class NewsCategoriesController extends Controller
{
    // phân trang
    private $pagination = 10;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCategory = $this->getCategories();
        $url = 'admin-pages.news-categories.list_news_categories';
        //$list = NewsCategory::orderBy('display_order', 'asc')->paginate($this->pagination);

        $view = view($url)->with('data', $listCategory);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin-pages.news-categories.add_edit_news_categories';
        $listCategory = $this->getCategories();
        $data = '';
        return view($url)->with('listCategory', $listCategory)->with('data', $data);
    }

    public function getCategories() 
    {
        $data = NewsCategory::buildListCategory();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $categories = new NewsCategory();
        $categories->name = $data['name'];
        $categories->desc = $data['desc'] ? $data['desc'] : '';
        $categories->content = $data['content'] ? $data['content'] : '';
        $categories->seo_name = $data['seo_name'];

        $get_image = request('img');
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('public/backend/uploads/news-categories', $new_image);
        $categories->image = $new_image;

        $categories->meta_title = $data['meta_title'] ? $data['meta_title'] : '';
        $categories->meta_desc = $data['meta_desc'] ? $data['meta_desc'] : '';
        $categories->meta_keyword = $data['meta_keyword'] ? $data['meta_keyword'] : '';

        $categories->parent_id = $data['parent_id'];
        if ($data['parent_id'] == 0) {
            $categories->root_id = " , ";
            $categories->level = 1;
        } else {
            $categories->level = 2;
            $get_root_id = NewsCategory::where('id', $data['parent_id'])->get('id')->first();
            $categories->root_id = " , " . $get_root_id->id . " , ";
        }

        $categories->display_order = NewsCategory::max('display_order') + 1;
        $categories->representative = $data['representative'];
        $categories->status = $data['status'];
        $categories->save();

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/news-categories');
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
        $url = 'admin-pages.news-categories.add_edit_news_categories';
        $data = NewsCategory::where('id', $id)->first();
        $listCategory = $this->getCategories();
        $view = view($url)
        ->with('data', $data)
        ->with('listCategory', $listCategory);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $getImage = $request->file('img');
        if ($getImage) {
            $old_image = NewsCategory::where('id', $id)->get('image')->first();
            unlink('public/backend/uploads/news-categories/'.$old_image->image);

            $getNameImage = $getImage->getClientOriginalName();
            $nameImage = current(explode('.', $getNameImage));
            $newImage = $nameImage . rand(0, 99) . '.' . $getImage->getClientOriginalExtension();
            $getImage->move('public/backend/uploads/news-categories', $newImage);
            $data['image'] = $newImage;
        }

        $data['name'] = $dataRequest['name'];
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';
        $data['content'] = isset($dataRequest['content']) ? $dataRequest['content'] : '';
        $data['seo_name'] = isset($dataRequest['seo_name']) ? $dataRequest['seo_name'] : '';

        $data['meta_title'] = isset($dataRequest['meta_title']) ? $dataRequest['meta_title'] : '';
        $data['meta_desc'] = isset($dataRequest['meta_desc']) ? $dataRequest['meta_desc'] : '';
        $data['meta_keyword'] = isset($dataRequest['meta_keyword']) ? $dataRequest['meta_keyword'] : '';

        $data['parent_id'] = $request->parent_id;
        if ($data['parent_id'] == 0) {
            $data['root_id'] = " , ";
            $data['level'] = 1;
        } else {
            $data['level'] = 2;
            $get_root_id = NewsCategory::where('id', $data['parent_id'])->get('id')->first();
            $data['root_id'] = " , " . $get_root_id->id . " , ";
        }

        $data['representative'] = $dataRequest['representative'];
        $data['status'] = $dataRequest['status'];
        NewsCategory::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/news-categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $get_image = NewsCategory::where('id', $id)->get('image')->first();
        $path = base_path('public/backend/uploads/news-categories');
        $exists = file_exists($path.'/'.$get_image->image);
        if ($exists) {
            unlink('public/backend/uploads/news-categories/'.$get_image->image);
        }
        NewsCategory::where('id', $id)->delete();
        Toastr::success('Xóa thành công', 'Thành công');
        return redirect()->back();
    }

    //bật tắt trạng thái
    public function unactivate_news_categories_status($id)
    {
        NewsCategory::where('id', $id)->update(['status' => 0]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_news_categories_status($id)
    {
        NewsCategory::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    //bật tắt tiêu biểu
    public function unactivate_news_categories_representative($id)
    {
        NewsCategory::where('id', $id)->update(['representative' => 0]);
        Toastr::success('Tắt trạng thái tiêu biểu thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_news_categories_representative($id)
    {
        NewsCategory::where('id', $id)->update(['representative' => 1]);
        Toastr::success('Mở trạng thái tiêu biểu thành công', 'Thành công');
        return redirect()->back();
    }
}
