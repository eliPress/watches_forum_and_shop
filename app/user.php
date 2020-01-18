<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;

class user extends Model {

public static function saveUser($request) {
$valid = false;
$user = new self();
$user->name = $request['name'];
$user->email = $request['email'];
$user->password = Hash::make($request['password']);
$user->role = 2;
$user->save();
if ($user->id) {
$valid = true;
}
return $valid;
}

public static function saveNewCustomers($request) {
$valid = false;
$customer = new self();
$customer->name = $request['name'];
$customer->email = $request['email'];
$customer->password = Hash::make($request['password']);
$customer->role = 2;
$customer->save();
if ($customer->id) {
$valid = true;
}
return $valid;
}

public static function updateCustomer($request, $id){
$valid = false;
$customer = self::find($id);
$customer->name=$request['name'];
$customer->email=$request['email'];
$customer->save();
$valid=true;
return $valid;
}


}
