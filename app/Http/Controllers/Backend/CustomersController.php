<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomersRequest;
use App\Models\Customer;
use App\Models\MovieCustomer;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class CustomersController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = 'admin-pages.users.list_customers';
        $list = Customer::orderBy('id', 'desc')->paginate($this->pagination);

        $view = view($url)
        ->with('data', $list);
        return view('admin_layout')->with($url, $view);
    }

    public function search(Request $request) 
    {
        $url = 'admin-pages.users.list_customers';
        $data = $request->all();
        // không có data
        if ($data['username'] == '' && $data['status'] == '' && $data['email'] == '' && $data['phone'] == '') {
            return Redirect::to('admin/customers');
        }
        // có data
        else {
            $list = Customer::orderBy('id', 'desc');
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
        $url = 'admin-pages.users.add_edit_customers';
        $data = '';
        return view($url)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomersRequest $request)
    {
        $data = $request->all();

        $item = new Customer();
        $item->fullname = $data['fullname'] ? $data['fullname'] : '';
        $item->username = $data['username'];
        $item->password = md5($data['password']);
        $item->email = $data['email'];
        $item->phone = $data['phone'];
        $item->balance = $data['balance'];
        $item->status = $data['status'];

        $item->save();
        Toastr::success('Thêm thành công', 'Thành công');
        return Redirect::to('admin/customers');
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
        $url = 'admin-pages.users.add_edit_customers';
        $data = Customer::where('id', $id)->first();
        $view = view($url)->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomersRequest $request, string $id)
    {
        $dataRequest = $request->all() ;
        $data = array();

        $data['username'] = $dataRequest['username'];
        $data['fullname'] = isset($dataRequest['fullname']) ? $dataRequest['fullname'] : '';
        $data['email'] = $dataRequest['email'];
        $data['phone'] = $dataRequest['phone'];
        $data['balance'] = $dataRequest['balance'];

        if ($dataRequest['password']) {
            $check_old_password = Customer::where('id', $id)
            ->where('password', md5($request->old_password))->get('password')->first();
            if ($check_old_password && $check_old_password->password != md5($request->password)) {
                if ($request->password == $request->re_password) {
                    $data['password'] = md5($request->re_password);
                }
                else {
                    Toastr::error('Mật khẩu nhập lại không đúng', 'Thất bại');
                    return Redirect::to('admin/customers/'.$id.'/edit');
                }
            }
            else {
                Toastr::error('Mật khẩu cũ không đúng hoặc mật khẩu mới bị trùng', 'Thất bại');
                return Redirect::to('admin/customers/'.$id.'/edit');
            }
        }
        

        Customer::where('id', $id)->update($data);
        Toastr::success('Cập nhật thành công', 'Thành công');
        return Redirect::to('admin/customers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check_item = Customer::where('id', $id)
        ->where('balance', '!=', '0 VND')
        ->get()->first();
        if ($check_item) {
            Toastr::error('Tài khoản có tiền', 'Thất bại');
        } else {
            Customer::where('id', $id)->delete();
            Toastr::success('Xóa thành công', 'Thành công');
        }
        return redirect()->back();
    }

    //bật tắt trạng thái
    public function unactivate_customers_status($id)
    {
        Customer::where('id', $id)->update(['status' => 2]);
        Toastr::success('Tắt hoạt động thành công', 'Thành công');
        return redirect()->back();
    }

    public function activate_customers_status($id)
    {
        Customer::where('id', $id)->update(['status' => 1]);
        Toastr::success('Mở hoạt động thành công', 'Thành công');
        return redirect()->back();
    }
}
