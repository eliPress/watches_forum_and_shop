<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use Cart;
use App\page;

class pagesController extends Controller {

    public function home() {
        self::$data['categories'] = Categorie::all()->toArray();
        self::$data['url'] = page::where('url')->first();
        self::$data['title'] .= ' Home';
        return view('home', self::$data);
    }

    public function showCat($cat_name) {
        $cat = Categorie::where('cat_name', "$cat_name")->first()->toArray();
        $products = self::$data['products'] = Product::where('cat_id', "{$cat['id']}")->paginate(4);
        self::$data['objProducts'] = $products;
        self::$data['products'] = $products->toArray();
        self::$data['title'] .= " " . $cat_name;
        return view('category', self::$data);
    }

    public function showProduct($product_id) {

        $product = Product::find($product_id)->toArray();
        $cat = Categorie::where('id', "{$product['cat_id']}")->first()->toArray();
        self::$data['category'] = $cat;
        self::$data['product'] = $product;
        self::$data['title'] .= "{$product['name']} ";
        return view('product', self::$data);
    }

    public static function showDashboard() {

        return view('cms.dashboard', self::$data);
    }

}
