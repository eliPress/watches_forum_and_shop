<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;


class Product extends Model {
    
        
        
       
       
    public static $fileName;

    public static function saveNewProduct($request) {

        $valid = false;
        $product = new self();
        $product->name = str_replace(" ", "_", $request->name);
        $product->description = $request->description;
        $product->price=$request->price;
        $product->cat_id= $request->cat_name;
        $product->image = self::uploadProductImage($request);
        $product->save();
        if ($product->id) {
            $valid = true;
            return $valid;
        }
        
    }
    
     public static function uploadProductImage($request) {
        $file = $request->file('image');
        self::$fileName="default.jpg";
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            self::$fileName = time() . $file->getClientoriginalName();
            $file->move(public_path() . "\images",self::$fileName);
           
        }
        return self::$fileName;
    }
    
    
//       public static function editProduct($request) {
//        $file = $request->file('image');
//        self::$fileName="default.jpg";
//        if ($request->hasFile('image') && $request->file('image')->isValid()) {
//            self::$fileName = time() . $file->getClientoriginalName();
//            $file->move(public_path() . "\images",self::$fileName);
//           
//        }
//        return self::$fileName;
//    }
    
    
    public static function updateProductToCategory($request, $id){
        $valid=false;
        $product = self::find($id);
       
        $product->cat_id= str_replace(" ","_",$request->cat_name) ;
        $product->name =  $request->name;
        $product->description = $request->description;
        $product->image = self::uploadProductImage($request);
        $product->price=$request->price;
        $product->save();
        if ($product->id) {
            $valid = true;
        }
            return $valid;
        
    }
    
    

}
