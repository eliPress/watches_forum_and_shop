<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Session;
use App\Http\Requests\editOrder;

class CmsOrders extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= 'Order';
        self::$data['orders'] = order::all()->toArray();
        return view('cms.orders.orders', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= 'Orders';
        return view('cms.orders.addNewOrders', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        self::$data['title'] .= 'Delete Orders';
        self::$data['deleteType'] = 'Orders';
        self::$data['orders'] = order::find($id);
        return view('cms.orders.deletOrders', self::$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        self::$data['title'] .= 'Edit Your Order';
        self::$data['orders'] = order::find($id)->toArray();
        return view('cms.orders.editOrder', self::$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editOrder $request, $id) {
         if (order::updateOrder($request,$id)) {
            Session::flash('sm', 'order have been added');
            return redirect('cms/orders/orders');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if ($id && is_numeric($id)) {
            //לבדוק שהיד קיים בדיביי
            order::destroy($id);
            Session::flash('sm', 'order have been deleted');
            return redirect('cms/orders/orders');
        }
    }

}
