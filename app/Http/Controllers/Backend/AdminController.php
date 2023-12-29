<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
                Session::put('admin_level', $admin->level);
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
        // Session::put('admin_name', null); // reset session
        // Session::put('admin_id', null);

        Auth::logout();

        Toastr::success('Đăng xuất thành công', 'Thành công');

        return Redirect::to('admin/login');
    }

}
