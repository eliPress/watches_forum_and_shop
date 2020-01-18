<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session,
    Cart;
use Illuminate\Support\Facades\DB;

class order extends Model {

    public static function saveOrder() {
        $valid = false;
        $order = new self();
        $order->user_id = Session::get('user_id');
        $order->content = Cart::getContent()->toJson();
        $order->subtotal = Cart::getTotal();
        $order->save();
//        echo "<pre>";
//        print_r($order);die;
        if ($order->id) {
//            Session::get('order_id');
            Cart::clear();
            $valid = true;
        }
        return $valid;
    }

    public static function updateOrder($request, $id) {
        $valid = false;
        $order = self::find($id);
        $order->user_id = $request['user_id'];
        $order->content = $request['content'];
        $order->subtotal = $request['subtotal'];
        $order->save();
        $valid = true;
        return $valid;
    }

}
