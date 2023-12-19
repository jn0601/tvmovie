<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class OrdersController extends Controller
{
    // phân trang
    private $pagination = 10;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Order::orderBy('display_order', 'desc')->paginate($this->pagination);
        $url = 'admin-pages.orders.list_orders';

        $view = view($url)->with('data', $list);
        return view('admin_layout')->with($url, $view);
    }

    public function search(Request $request) 
    {
        $url = 'admin-pages.orders.list_orders';
        $data = $request->all();
        // không có data
        if ($data['code'] == '' && $data['status'] == '') {
            return Redirect::to('admin/orders');
        }
        // có data
        else {
            // search status
            if ($data['code'] == '' && $data['status'] != '') {
                $list = Order::where('status', $data['status'])
                ->orderBy('display_order', 'desc')
                ->paginate($this->pagination);
            } 
            else {
                // search status và code
                if ($data['status']) {
                    $list = Order::where('code', 'like', '%' . $data['code'] . '%')
                    ->where('status', $data['status'])
                    ->orderBy('display_order', 'desc')
                    ->paginate($this->pagination);
                } 
                // search code
                else {
                    $list = Order::where('code', 'like', '%' . $data['code'] . '%')
                    ->orderBy('display_order', 'desc')
                    ->paginate($this->pagination);
                }
            }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $url = 'admin-pages.orders.show_orders';
        $data = Order::where('id', $id)->first();
        $view = view($url)->with('data', $data);
        return view('admin_layout')->with($url, $view);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
