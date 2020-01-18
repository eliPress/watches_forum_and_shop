<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

    public static $fileName;

    public static function saveNewCategory($request) {
//self::uploadFile($request);
$valid=false;
        $category = new self();
        $category->cat_name = str_replace(" ", "_", $request->cat_name);
        $category->description = $request->description;
        $category->image = self::uploadFile($request);
        $category->save();
        if($category->id){
            $valid=true;
            return $valid;
        }
    }

    public static function uploadFile($request) {
        $file = $request->file('image');
        self::$fileName="default.jpg";
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            self::$fileName = time() . $file->getClientoriginalName();
            $file->move(public_path() . "\images",self::$fileName);
           
        }
        return self::$fileName;
    }
    
    public static function updateCategory($request,$id){
        $valid=false;
        $category = self::find($id);
        $checkCatName=self::where('cat_name','=',str_replace(" ", "_",$request->cat_name))
                ->get()
                ->toArray();
        
        if(count($checkCatName)<2){
        $category->cat_name = str_replace(" ", "_", $request->cat_name);
        $category->description = $request->description;
        if($request->hasFile('image')){
        $category->image = self::uploadFile($request);
        }
        $category->save();
        if($category->id){
            $valid=true;
            return $valid;
        }
    }
    }

}
