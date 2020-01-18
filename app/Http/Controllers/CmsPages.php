<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\page;

class cmsPages extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        self::$data['title'] .= 'Pages';
        self::$data['pages'] = page::all()->toArray();
        return view('cms.pages.allPages', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        self::$data['title'] .= 'Add New Page';
        self::$data['pages'] = page::all()->toArray();

        return view('cms.pages.addPages', self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
         if (page::saveNewPage($request)) {
            Session::flash('sm', 'Page have been added');
            return redirect('cms/pages/allPages');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
    
    
    public static function showPage($url){
//        echo __METHOD__ ;
        self::$data['title'] .= 'Pages';
        self::$data['newPage'] = page::where('url',$url)->first();//url/find or die
         self::$data['url'] = page::where('url',$url)->first();
        return view('/', self::$data);
    }


//    public static function blabla(){
//        echo __METHOD__;die;
//    }

}
