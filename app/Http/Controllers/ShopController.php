<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use Session;
use App\order;

class shopController extends Controller {

    public static function AddToCart(Request $request) {
        if (is_numeric($request->product_id) && $request->product_id != 0) {
            //echo $_GET['product_id'];
//        dd($request->product_id);
            if ($product = Product::find($request->product_id)->toArray()) {
                Cart::add($product['id'], $product['name'], $product['price'], 1, array());
                Session::flash('sm', "{$product['name']} Added to the Cart");
                echo true;
            } else {
                #todo
            }
        } else {
            #todo
        }
    }

    public static function delete_product(Request $request) {
        Cart::remove($request->product_id);
        echo true;
    }

    public static function remove_from_cart(Request $request) {
        Cart::update($request->product_id, array(
            'quantity' => -1,
        ));

        echo true;
    }

    public static function ShowCart() {
        self::$data['title'] .= " Cart";
        self::$data['CartContent'] = json_decode(Cart::getContent()->toJson());
//        dd(self::$data['CartContent']);
        return view('cart', self::$data);
    }

    public static function saveOrder() {
        if (Session::get('user_id')) {
            if (Cart::getSubTotal() > 0) {
                if (order::saveOrder()) {
                    
                Session::put('orderId', order::get()->last());
                    Session::flash('sm', "your order has been saved");
                  
                    return redirect('shop/GoToCart');
                }
                return redirect('/')->withErrors("The cart is empty");
            } else {
            return redirect('shop/GoToCart')->withErrors("The cart is empty");

            }
        } else {
            return redirect('user/login')->withErrors("you must log in first");
        }
    }

}
