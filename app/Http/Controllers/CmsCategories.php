<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use App\Http\Requests\AddCategory;
use App\Http\Requests\updateCategory;
use Session;

class CmsCategories extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= 'categories';
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.categories', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= 'Add New Category';
        return view('cms.addcategory', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddCategory $request) {

        if (Categorie::saveNewCategory($request)) {
            Session::flash('sm', 'category have been added');
            return redirect('cms/categories');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (self::$data['category'] = Categorie::find($id)->toArray()) {
            self::$data['title'] .= 'Delete Form';
            self::$data['deleteType'] = 'category';
            return view('cms\deletForm', self::$data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (self::$data['category'] = Categorie::find($id)->toArray()) {
            self::$data['title'] .= 'Edit Form';
            return view('cms/editCategory',self::$data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (Categorie::updateCategory($request, $id)) {
            Session::flash('sm', 'category have been updated');
            return redirect('cms/categories');
        
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
            Categorie::destroy($id);
            Session::flash('sm', 'category have been deleted');

            return redirect('cms/categories');
        }
    }

}
