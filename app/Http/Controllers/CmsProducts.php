<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests\addProduct;
use App\Http\Requests\editProduct;



class CmsProducts extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= 'products';
//        self::$data['products'] = Product::all()->toArray();
        self::$data['products'] = DB::select('select * from categories as c join products as p on c.id=p.cat_id ');
        return view('cms.products.allProducts', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= 'Add New Product';
        self::$data['categories'] = Categorie::all()->toArray();

        return view('cms.products.addProduct', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addProduct $request) {
        if (Product::saveNewProduct($request)) {
            Session::flash('sm', 'Product have been added');
            return redirect('cms/products/allProducts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (self::$data['product'] = Product::find($id)->toArray()) {
            self::$data['title'] .= 'Delete Form';
            self::$data['deleteType'] = 'products';
            return view('cms.products.deletProduct', self::$data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if ($product =DB::select('select * from categories as c join products as p on c.id=p.cat_id where p.id=?',[$id])) {
          
        self::$data['product'] = $product[0];
        self::$data['categories'] = Categorie::all();
        self::$data['title'] .= 'Edit Your Order';
        return view('cms.products.editProduct', self::$data);
   }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(editProduct $request, $id) {

        if (Product::updateProductToCategory($request, $id)) {
            Session::flash('sm', 'category have been updated');
            return redirect('cms/products/allProducts');
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
            Product::destroy($id);
            Session::flash('sm', 'Product have been deleted');
            return redirect('cms/products/allProducts');
        }
    }

}
