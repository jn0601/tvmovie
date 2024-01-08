<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServerLinksRequest;
use App\Models\EpisodeServer;
use App\Models\ServerLink;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class ServerLinksController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ServerLink::orderBy('display_order', 'desc')->paginate($this->pagination);
        $url = 'admin-pages.server-links.list_servers';

        $view = view($url)->with('data', $list);
        return view('admin_layout')->with($url, $view);
    }

    public function search(Request $request) 
    {
        $url = 'admin-pages.server-links.list_servers';
        $data = $request->all();
        // không có data
        if ($data['name'] == '' && $data['status'] == '') {
            return Redirect::to('admin/server-links');
        }
        // có data
        else {
            $list = ServerLink::orderBy('display_order', 'desc');
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
        $url = 'admin-pages.server-links.add_edit_servers';
        $data = '';
        return view($url)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServerLinksRequest $request)
    {
        $data = $request->all();
        $item = new ServerLink();
        $item->name = $data['name'];
        $item->desc = $data['desc'] ? $data['desc'] : '';
        $item->seo_name = $data['seo_name'];

        $item->display_order = ServerLink::max('display_order') + 1;
        $item->status = $data['status'];
        $item->date_created = date("Y-m-d H:i:s");
        $item->date_updated = date("Y-m-d H:i:s");
        $item->save();

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/server-links');
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
        $url = 'admin-pages.server-links.add_edit_servers';
        $data = ServerLink::where('id', $id)->first();
        $view = view($url)->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServerLinksRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $data['name'] = $dataRequest['name'];
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';
        $data['seo_name'] = isset($dataRequest['seo_name']) ? $dataRequest['seo_name'] : '';

        $data['status'] = $dataRequest['status'];
        $data['date_updated'] = date("Y-m-d H:i:s");
        ServerLink::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/server-links');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check_item = EpisodeServer::where('server_id', $id)->get()->first();
        if ($check_item) {
            Toastr::error('Server có chứa tập phim', 'Thất bại');
        } else {
            ServerLink::where('id', $id)->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }
        return redirect()->back();
    }

    public function unactivate_server_links_status($id)
    {
        ServerLink::where('id', $id)->update(['status' => 2]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_server_links_status($id)
    {
        ServerLink::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
