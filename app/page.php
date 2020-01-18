<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    public static function saveNewPage($request){
        $valid=false;
        $page= new self();
        $page->page_name=$request['page_name'];
        $page->description=$request['description'];
        $page->save();
        
        if($request['id']){
            $valid=true;
        }
        return $valid;
    }
}
