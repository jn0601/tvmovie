<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = 'admin-pages.news.list_news';
        $list = News::orderBy('display_order', 'desc')->paginate($this->pagination);
        $listCategory = NewsCategory::orderBy('id', 'desc')->get();

        $view = view($url)->with('data', $list)->with('dataCategory', $listCategory);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin-pages.news.add_edit_news';
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
    public function store(NewsRequest $request)
    {
        $data = $request->all();
        $news = new News();
        $news->name = $data['name'];
        $news->desc = $data['desc'] ? $data['desc'] : '';
        $news->content = $data['content'] ? $data['content'] : '';
        $news->seo_name = $data['seo_name'];

        $get_image = request('img');
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
        $get_image->move('public/backend/uploads/news', $new_image);
        $news->image = $new_image;

        $news->tags = $data['tags'] ? $data['tags'] : '';
        $news->meta_title = $data['meta_title'] ? $data['meta_title'] : '';
        $news->meta_desc = $data['meta_desc'] ? $data['meta_desc'] : '';
        $news->meta_keyword = $data['meta_keyword'] ? $data['meta_keyword'] : '';

        $news->category_id = $data['category_id'];
        $news->admin_id = 123;
        $news->status = $data['status'];
        $news->options = isset($data['options']) ? implode(',', $data['options']) : '';
        $news->count_view = 0;
        $news->date_created = date("Ymd");
        $news->date_updated = date("Ymd");
        $news->display_order = News::max('display_order') + 1;
        $news->save();

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/news');
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
        $url = 'admin-pages.news.add_edit_news';
        $data = News::where('id', $id)->first();
        $listCategory = $this->getCategories();
        $view = view($url)
        ->with('data', $data)
        ->with('listCategory', $listCategory);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $getImage = $request->file('img');
        $data['name'] = $dataRequest['name'];
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';
        $data['content'] = isset($dataRequest['content']) ? $dataRequest['content'] : '';
        $data['seo_name'] = isset($dataRequest['seo_name']) ? $dataRequest['seo_name'] : '';

        $data['tags'] = isset($dataRequest['tags']) ? $dataRequest['tags'] : '';
        $data['meta_title'] = isset($dataRequest['meta_title']) ? $dataRequest['meta_title'] : '';
        $data['meta_desc'] = isset($dataRequest['meta_desc']) ? $dataRequest['meta_desc'] : '';
        $data['meta_keyword'] = isset($dataRequest['meta_keyword']) ? $dataRequest['meta_keyword'] : '';

        $data['options'] = isset($dataRequest['options']) ? implode(',', $dataRequest['options']) : '';
        $data['category_id'] = $dataRequest['category_id'];
        $data['admin_id'] = 123;
        $data['status'] = $dataRequest['status'];
        $data['date_updated'] = date("Ymd");

        if ($getImage) {
            $old_image = News::where('id', $id)->get('image')->first();
            unlink('public/backend/uploads/news/'.$old_image->image);

            $getNameImage = $getImage->getClientOriginalName();
            $nameImage = current(explode('.', $getNameImage));
            $newImage = $nameImage . rand(0, 99) . '.' . $getImage->getClientOriginalExtension();
            $getImage->move('public/backend/uploads/news', $newImage);
            $data['image'] = $newImage;
        }
        News::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/news');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $get_image = News::where('id', $id)->get('image')->first();
        $path = base_path('public/backend/uploads/news');
        $exists = file_exists($path.'/'.$get_image->image);
        if ($exists) {
            unlink('public/backend/uploads/news/'.$get_image->image);
        }
        News::where('id', $id)->delete();
        Toastr::success('Xóa thành công', 'Thành công');
        return redirect()->back();
    }

    //bật tắt trạng thái
    public function unactivate_news_status($id)
    {
        News::where('id', $id)->update(['status' => 0]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_news_status($id)
    {
        News::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
