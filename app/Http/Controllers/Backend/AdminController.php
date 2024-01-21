<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminsRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Models\RoleAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Brian2694\Toastr\Facades\Toastr;

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

class AdminController extends Controller
{
    // phân trang
    private $pagination = 10;

    public function index()
    {
        if (Auth::check()) {
            return redirect::to('admin');
        }
        else {
            return view('admin-pages.login.login');
        }
    }

    public function login(Request $request)
    {
        
        $username = $request->username;
        $admin_password = md5($request->password);
        $admin = Admin::where('username', $username)->where('status', 1)->first();
        if ($admin && $admin_password == $admin->password) {
            Auth::login($admin);
            if (Auth::check()) {
                Session::put('fullname', $admin->fullname);
                Session::put('admin_id', $admin->id);
                Session::put('admin_type', $admin->type);
                //Session::put('level', $admin->level);
                Toastr::success('Đăng nhập thành công', 'Thành công');
                //Session::put('message', 'Đăng nhập thành công'); 
                return redirect::to('admin');
            } else {
                Toastr::error('Tên tài khoản hoặc mật khẩu không đúng, vui lòng thử lại', 'Thất bại');
                //Session::put('message', 'Tên tài khoản hoặc mật khẩu không đúng, vui lòng thử lại'); 
                return redirect::to('admin/login');
            }
        } else {
            Toastr::error('Tên tài khoản hoặc mật khẩu không đúng, vui lòng thử lại', 'Thất bại');
            //Session::put('message', 'Tên tài khoản hoặc mật khẩu không đúng, vui lòng thử lại'); 
            return redirect::to('admin/login');
        }

    }

    public function logout()
    {
        Session::forget('fullname');
        Session::forget('admin_id');
        Session::forget('admin_type');

        Auth::logout();

        Toastr::success('Đăng xuất thành công', 'Thành công');

        return Redirect::to('admin/login');
    }

    public function list()
    {
        $url = 'admin-pages.users.list_admins';
        $mainRole = Role::orderBy('id', 'desc')->get();
        $listRole = RoleAdmin::orderBy('id', 'desc')->get();
        $get_id = Session::get('admin_id');
        $get_type = Session::get('admin_type');
        if ($get_type == 99) {
            $list = Admin::orderBy('admins.id', 'desc')
            ->paginate($this->pagination);
        } else {
            $list = Admin::where('type', '!=', 99)->orderBy('admins.id', 'desc')
            ->paginate($this->pagination);
        }
        // dd($list);
        $view = view($url)
        ->with('listRole', $listRole)
        ->with('mainRole', $mainRole)
        ->with('get_id', $get_id)
        ->with('get_type', $get_type)
        ->with('data', $list);
        return view('admin_layout')->with($url, $view);
    }

    public function search(Request $request) 
    {
        $url = 'admin-pages.users.list_admins';
        $mainRole = Role::orderBy('id', 'desc')->get();
        $listRole = RoleAdmin::orderBy('id', 'desc')->get();
        $get_id = Session::get('admin_id');
        $get_type = Session::get('admin_type');
        $data = $request->all();
        // không có data
        if ($data['username'] == '' && $data['status'] == '' && $data['email'] == '' && $data['phone'] == '' && $data['role'] == '') {
            return Redirect::to('admin/admins/list-admin');
        }
        // có data
        else {
            if ($get_type == 99) {
                $list = Admin::select('admins.*','admins.id as main_id')
                ->join('role_admins', 'role_admins.admin_id', '=', 'admins.id')
                ->join('roles', 'roles.id', '=', 'role_admins.role_id')
                ->orderBy('main_id', 'desc');
            } else {
                $list = Admin::select('admins.*','admins.id as main_id')
                ->join('role_admins', 'role_admins.admin_id', '=', 'admins.id')
                ->join('roles', 'roles.id', '=', 'role_admins.role_id')
                ->where('type', '!=', 99)
                ->orderBy('main_id', 'desc');
            }
            if($data['username']) {
                $list = $list->where('username', 'like', '%' . $data['username'] . '%');
            } 
            if($data['email']) {
                $list = $list->where('email', 'like', '%' . $data['email'] . '%');
            } 
            if($data['phone']) {
                $list = $list->where('phone', 'like', '%' . $data['phone'] . '%');
            } 
            if($data['status']) {
                $list = $list->where('status', $data['status']);
            }
            if ($data['role']) {
                $list = $list->where('roles.id', $data['role']);
            }
            
            $list = $list->paginate($this->pagination);
            // $list = $list->get();
        }
        // dd($list);
        $view = view($url)
        ->with('data', $list)
        ->with('listRole', $listRole)
        ->with('mainRole', $mainRole)
        ->with('get_type', $get_type)
        ->with('get_id', $get_id)
        ->with('search_value', $data);
        return view('admin_layout')->with($url, $view);
    }

    public function create()
    {
        $url = 'admin-pages.users.add_edit_admins';
        $listRole = Role::orderBy('id', 'asc')->get();
        $get_type = Session::get('admin_type');
        $data = '';
        return view($url)
        ->with('get_type', $get_type)
        ->with('listRole', $listRole)
        ->with('data', $data);
    }

    public function store(AdminsRequest $request)
    {
        $data = $request->all();

        $item = new Admin();
        $item->fullname = $data['fullname'] ? $data['fullname'] : '';
        $item->username = $data['username'];
        $item->password = md5($data['password']);
        $item->email = $data['email'];
        $item->phone = $data['phone'];
        $item->type = $data['type'];
        $item->status = $data['status'];

        $item->save();

        //save vào table phụ
        $get_qtv = Role::where('name', 'Quản trị viên')->first();
        if ($item->type == 99) {
            $role_admin = new RoleAdmin();
            $role_admin->role_id = $get_qtv->id;
            $role_admin->admin_id = $item->id;
            $role_admin->save();
        } else {
            $role = $request->input('role_id');
            if ($role) {
                foreach ($role as $key => $value) {
                    $role_admin = new RoleAdmin();
                    $role_admin->role_id = $value;
                    $role_admin->admin_id = $item->id;
                    $role_admin->save();
                }
            }
        }

        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/admins/list-admin');
    }

    public function edit(string $id)
    {
        $url = 'admin-pages.users.add_edit_admins';
        $get_type = Session::get('admin_type');
        $listRole = Role::orderBy('id', 'asc')->get();
        $subRole = RoleAdmin::join('roles', 'roles.id', '=', 'role_admins.role_id')->where('role_admins.admin_id', $id)->get();
        $data = Admin::where('id', $id)->first();
        $view = view($url)
        ->with('get_type', $get_type)
        ->with('listRole', $listRole)
        ->with('subRole', $subRole)
        ->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    public function update(AdminsRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $data['username'] = $dataRequest['username'];
        $data['fullname'] = isset($dataRequest['fullname']) ? $dataRequest['fullname'] : '';
        $data['email'] = $dataRequest['email'];
        $data['phone'] = $dataRequest['phone'];
        // $data['type'] = $dataRequest['type'];

        if ($dataRequest['password']) {
            $check_old_password = Admin::where('id', $id)
            ->where('password', md5($request->old_password))->get('password')->first();
            if ($check_old_password && $check_old_password->password != md5($request->password)) {
                if ($request->password == $request->re_password) {
                    $data['password'] = md5($request->re_password);
                }
                else {
                    Toastr::error('Mật khẩu nhập lại không đúng', 'Thất bại');
                    return Redirect::to('admin/admins/list-admin/'.$id.'/edit');
                }
            }
            else {
                Toastr::error('Mật khẩu cũ không đúng hoặc mật khẩu mới bị trùng', 'Thất bại');
                return Redirect::to('admin/admins/list-admin/'.$id.'/edit');
            }
        }

        Admin::where('id', $id)->update($data);

        //update bảng phụ
        $role = $request->input('role_id');
        if ($role) {
            RoleAdmin::where('admin_id', $id)->delete();
            foreach ($role as $key => $value) {
                $role_admin = new RoleAdmin();
                $role_admin->role_id = $value;
                $role_admin->admin_id = $id;
                $role_admin->save();
            }
        }

        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/admins/list-admin');
    }

    public function destroy(string $id)
    {
        Admin::where('id', $id)->delete();
        Toastr::success('Xóa thành công', 'Thành công');
        return redirect()->back();
    }

    //bật tắt trạng thái
    public function unactivate_admins_status($id)
    {
        Admin::where('id', $id)->update(['status' => 2]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_admins_status($id)
    {
        Admin::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

}
