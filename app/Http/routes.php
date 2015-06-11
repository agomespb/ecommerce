<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::controllers([
    'auth' => 'Auth\AuthController',
    'authadmin' => 'Auth\AdminAuthController',
    'password' => 'Auth\PasswordController',
]);


/**
 **************************************************************************
 * Valida ID passado como Parâmetro
 **************************************************************************
 */
//Route::pattern('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Ambiente da Loja!!!
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => '/', 'middleware'=>'notaddress', 'where' => ['id'=>'[0-9]+']], function() {

    Route::get('', ['as' => 'index', 'uses' => 'StoreController@index']);

    Route::get('home', ['as' => 'home', 'uses' => 'StoreController@index']);

    Route::get('contact', ['as' => 'contact', 'uses' => 'StoreController@contact']);

    Route::get('category/{id}/products', ['as' => 'index_category', 'uses' => 'StoreController@indexCategory']);

    Route::get('product/{id}/show', ['as' => 'product_show', 'uses' => 'StoreController@productShow']);

    Route::get('tag/{id}/products', ['as' => 'tag_products', 'uses' => 'StoreController@tagProducts']);

});

Route::group(['prefix' => 'cart', 'middleware'=>'notaddress', 'where' => ['id'=>'[0-9]+']], function() {

    Route::get('', ['as' => 'cart', 'uses' => 'CartController@index']);

    Route::get('product/{id}/add', ['as' => 'cart_add', 'uses' => 'CartController@add']);

    Route::get('product/{id}/minus', ['as' => 'cart_minus', 'uses' => 'CartController@minus']);

    Route::get('product/destroy/{id}', ['as' => 'cart_destroy', 'uses' => 'CartController@destroy']);

});

Route::group(['prefix' => 'checkout', 'middleware'=>'notaddress', 'where' => ['id'=>'[0-9]+']], function() {

    Route::get('', ['as' => 'checkout', 'uses' => 'CheckoutController@checkout']);

    Route::get('order', ['as' => 'checkout_place', 'uses' => 'CheckoutController@place']);

});

Route::group(['prefix' => 'user', 'middleware'=>'auth', 'where' => ['id'=>'[0-9]+']], function(){


    Route::get('', ['as' => 'user_index', 'uses' => 'UserAccountController@index']);

    Route::get('address/create', ['as' => 'user_address_create', 'uses' => 'UserAddressController@create']);

    Route::post('address/store', ['as' => 'user_address_store', 'uses' => 'UserAddressController@store']);

    Route::get('address/destroy/{id}', ['as' => 'user_address_destroy', 'uses' => 'UserAddressController@destroy']);

});

/*
|--------------------------------------------------------------------------
| ROTAS ADMINISTRATIVAS (Categorias / Produtos)
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'middleware'=>'admin_auth', 'where' => ['id'=>'[0-9]+']], function(){

    /*
    |--------------------------------------------------------------------------
    | Categorias
    |--------------------------------------------------------------------------
    |
    */
    Route::group(['prefix' => 'categories'], function(){

        Route::get('', ['as' => 'categories', 'uses' => 'AdminCategoriesController@index']);

        Route::post('', ['as' => 'store_category', 'uses' => 'AdminCategoriesController@store']);

        Route::get('create', ['as' => 'new_category', 'uses' => 'AdminCategoriesController@create']);

        Route::get('{id}/show', ['as' => 'show_category', 'uses' => 'AdminCategoriesController@show']);

        Route::get('destroy/{id}', ['as' => 'destroy_category', 'uses' => 'AdminCategoriesController@destroy']);

        Route::get('{id}/edit', ['as' => 'edit_category', 'uses' => 'AdminCategoriesController@edit']);

        Route::put('{id}/update', ['as' => 'update_category', 'uses' => 'AdminCategoriesController@update']);

    });

    /*
    |--------------------------------------------------------------------------
    | Produtos
    |--------------------------------------------------------------------------
    |
    */
    Route::group(['prefix' => 'products'], function(){

        Route::get('', ['as' => 'products', 'uses' => 'AdminProductsController@index']);

        Route::post('', ['as' => 'store_product', 'uses' => 'AdminProductsController@store']);

        Route::get('create', ['as' => 'new_product', 'uses' => 'AdminProductsController@create']);

        Route::get('{id}/show', ['as' => 'show_product', 'uses' => 'AdminProductsController@show']);

        Route::get('destroy/{id}', ['as' => 'destroy_product', 'uses' => 'AdminProductsController@destroy']);

        Route::get('{id}/edit', ['as' => 'edit_product', 'uses' => 'AdminProductsController@edit']);

        Route::put('{id}/update', ['as' => 'update_product', 'uses' => 'AdminProductsController@update']);


        Route::group(['prefix' => 'images'], function(){

            Route::get('{id}/index', ['as' => 'products_images', 'uses' => 'AdminProductsController@images']);

            Route::get('{id}/create', ['as' => 'products_images_create', 'uses' => 'AdminProductsController@createImage']);

            Route::get('destroy/{id}', ['as' => 'products_images_destroy', 'uses' => 'AdminProductsController@destroyImage']);

            Route::post('{id}/store', ['as' => 'products_images_store', 'uses' => 'AdminProductsController@storeImage']);

        });

    });

    /*
    |--------------------------------------------------------------------------
    | Usuários
    |--------------------------------------------------------------------------
    |
    */
    Route::group(['prefix' => 'users'], function(){

        Route::get('', ['as' => 'users', 'uses' => 'AdminUsersController@index']);

        Route::post('', ['as' => 'store_user', 'uses' => 'AdminUsersController@store']);

        Route::get('create', ['as' => 'new_user', 'uses' => 'AdminUsersController@create']);

        Route::get('{id}/show', ['as' => 'show_user', 'uses' => 'AdminUsersController@show']);

        Route::get('destroy/{id}', ['as' => 'destroy_user', 'uses' => 'AdminUsersController@destroy']);

        Route::get('{id}/edit', ['as' => 'edit_user', 'uses' => 'AdminUsersController@edit']);

        Route::put('{id}/update', ['as' => 'update_user', 'uses' => 'AdminUsersController@update']);

    });

    /*
    |--------------------------------------------------------------------------
    | Pedidos
    |--------------------------------------------------------------------------
    |
    */
    Route::group(['prefix' => 'orders'], function(){

        Route::get('', ['as' => 'orders', 'uses' => 'AdminOrdersController@index']);

        Route::put('update/{id}', ['as' => 'order_update', 'uses' => 'AdminOrdersController@update']);

//        Route::post('', ['as' => 'order_store', 'uses' => 'AdminOrdersController@store']);
//
//        Route::get('show/{id}', ['as' => 'order_show', 'uses' => 'AdminOrdersController@show']);
//
//        Route::get('destroy/{id}', ['as' => 'order_destroy', 'uses' => 'AdminOrdersController@destroy']);
//
//        Route::get('edit/{id}', ['as' => 'order_edit', 'uses' => 'AdminOrdersController@edit']);


    });

});

