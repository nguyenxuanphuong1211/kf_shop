<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use Toastr;
use App\Bill_detail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Bill::orderBy('id', 'desc')->get();
        return view('admin.orders.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailOrder($order)
    {
        $orders_detail = Bill_detail::where('bill_id', $order)->get();
        return view('admin.orders.detail', compact('orders_detail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($order)
    {
        $bill = Bill::find($order);
        if($bill ->status == 0)
        {
            $bill ->status = '1';
        }
        elseif ($bill ->status ==1) {
            $bill ->status ='0';
        }
        $bill ->save();
        Toastr::success('Change Order status successful', $title = null, $options = []);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
