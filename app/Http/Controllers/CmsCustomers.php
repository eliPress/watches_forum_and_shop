<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Http\Requests\signUpRequest;

use App\Http\Requests\updateCustomer;
use Session;

class CmsCustomers extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= 'customers';
        self::$data['customers'] = User::all()->toArray();
        return view('cms.customer.customers', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= 'customers';
        return view('cms.customer.addNewCustomer', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(signUpRequest $request) {
        if (user::saveNewCustomers($request)) {
            Session::flash('sm', 'customers have been added');
            return redirect('cms/customer/customers');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        self::$data['title'] .= 'Delete Customers';
        self::$data['deleteType'] = 'Customers';
        self::$data['customers'] = User::find($id);
        return view('cms.customer.deletCustomers', self::$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        self::$data['title'] .= 'Edit Your Customer';
        self::$data['customers'] = User::find($id)->toArray();
        return view('cms.customer.EditCustomer', self::$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateCustomer $request, $id) {
        
        if (user::updateCustomer($request,$id)) {
            Session::flash('sm', 'customers have been added');
            return redirect('cms/customer/customers');
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
            User::destroy($id);
            Session::flash('sm', 'customer have been deleted');
            return redirect('cms/customer/customers');
        }
    }

}
