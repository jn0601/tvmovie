<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class ServicesController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Service::orderBy('display_order', 'desc')->paginate($this->pagination);
        $url = 'admin-pages.services.list_services';

        $view = view($url)->with('data', $list);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin-pages.services.add_edit_services';
        $data = '';
        return view($url)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServicesRequest $request)
    {
        $data = $request->all();
        $item = new Service();
        $item->name = $data['name'];
        $item->desc = $data['desc'] ? $data['desc'] : '';
        $item->seo_name = $data['seo_name'];
        $item->price = $data['price'];

        $item->display_order = Service::max('display_order') + 1;
        $item->status = $data['status'];
        $item->date_created = date("Y-m-d H:i:s");
        $item->date_updated = date("Y-m-d H:i:s");
        //dd($item);
        $item->save();

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/services');
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
        $url = 'admin-pages.services.add_edit_services';
        $data = Service::where('id', $id)->first();
        $view = view($url)->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServicesRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $data['name'] = $dataRequest['name'];
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';
        $data['seo_name'] = isset($dataRequest['seo_name']) ? $dataRequest['seo_name'] : '';
        $data['price'] = isset($dataRequest['price']) ? $dataRequest['price'] : '';

        $data['status'] = $dataRequest['status'];
        $data['date_updated'] = date("Y-m-d H:i:s");
        Service::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/services');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check_item = Order::where('service_id', $id)->where('status', 2)->get()->first();
        if ($check_item) {
            Toastr::error('Dịch vụ có đơn hàng chưa xử lí', 'Thất bại');
        } else {
            Service::where('id', $id)->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }
        return redirect()->back();
    }

    public function unactivate_services_status($id)
    {
        Service::where('id', $id)->update(['status' => 2]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_services_status($id)
    {
        Service::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
