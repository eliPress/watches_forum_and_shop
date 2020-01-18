<?php

Route::get('/', 'pagesController@home');
Route::get('category/{cat_name}', 'pagesController@showCat');
Route::get('product/{product_id}', 'pagesController@showProduct');


Route::prefix('shop')->group(function () {
    Route::get("AddToCart", "ShopController@AddToCart");
    Route::get("delete_product", "ShopController@delete_product");
    Route::get("remove_from_cart", "ShopController@remove_from_cart");
    Route::get("GoToCart", "ShopController@ShowCart");
    Route::get("save_order", "ShopController@saveOrder");
});


Route::prefix('user')->group(function () {
    Route::get("login", "userController@showLoginForm");
    Route::get("signin", "userController@showSignInForm");
    Route::get("logout", "userController@logOut");
    Route::get("CMS", "userController@showDashboard");
    Route::post("login", "userController@validateUser");
    Route::post("signin", "userController@validateNewUser");
});

Route::group(['middleware' => ['CmsDashboard']], function () {
    Route::prefix('cms')->group(function () {
        Route::get("dashboard", "pagesController@showDashboard");
        Route::resource('categories', 'CmsCategories');
        Route::resource('customer/customers', 'CmsCustomers');
        Route::resource('orders/orders', 'CmsOrders');
        Route::resource('products/allProducts', 'CmsProducts');
        Route::resource('pages/allPages', 'CmsPages');
        Route::get('pages/{pages}', 'CmsPages@store');
    });
});

    Route::resource('pay', 'pay');


  Auth::routes();
  Route::get('/home','HomeController@index')->name('home');
    
//facebook log in
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


Route::get('{url}','CmsPages@showPage');