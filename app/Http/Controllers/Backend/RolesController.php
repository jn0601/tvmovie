<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Models\RoleAdmin;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = 'admin-pages.users.list_roles';
        $list = Role::orderBy('id', 'asc')->paginate($this->pagination);
        $get_type = Session::get('admin_type');
        $view = view($url)
        ->with('get_type', $get_type)
        ->with('data', $list);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $url = 'admin-pages.users.add_edit_roles';
        $data = '';
        return view($url)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolesRequest $request)
    {
        $data = $request->all();
        $item = new Role();
        $item->name = $data['name'];
        $item->desc = $data['desc'] ? $data['desc'] : '';
        $item->status = $data['status'];
        $item->save();

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/roles');
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
        $url = 'admin-pages.users.add_edit_roles';
        $data = Role::where('id', $id)->first();
        $view = view($url)->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolesRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $data['name'] = $dataRequest['name'];
        $data['desc'] = isset($dataRequest['desc']) ? $dataRequest['desc'] : '';

        Role::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check_item = RoleAdmin::where('role_id', $id)->get()->first();
        if ($check_item) {
            Toastr::error('Tồn tại người dùng thuộc vai trò', 'Thất bại');
        } else {
            Role::where('id', $id)->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }
        return redirect()->back();
    }

    //bật tắt trạng thái
    public function unactivate_roles_status($id)
    {
        Role::where('id', $id)->update(['status' => 2]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_roles_status($id)
    {
        Role::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
