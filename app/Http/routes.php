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


Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
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

Route::get('/', ['as' => 'home', 'uses' => 'StoreController@index']);

Route::group(['prefix' => 'loja', 'where' => ['id'=>'[0-9]+']], function() {

    Route::get('category/{id}/products', ['as' => 'index_category', 'uses' => 'StoreController@indexCategory']);

    Route::get('product/{id}/show', ['as' => 'product_show', 'uses' => 'StoreController@productShow']);

    Route::get('tag/{id}/products', ['as' => 'tag_products', 'uses' => 'StoreController@tagProducts']);

});

Route::group(['prefix' => 'cart', 'where' => ['id'=>'[0-9]+']], function() {

    Route::get('', ['as' => 'cart', 'uses' => 'CartController@index']);

    Route::get('product/{id}/add', ['as' => 'cart_add', 'uses' => 'CartController@add']);

    Route::get('product/{id}/minus', ['as' => 'cart_minus', 'uses' => 'CartController@minus']);

    Route::get('product/destroy/{id}', ['as' => 'cart_destroy', 'uses' => 'CartController@destroy']);

});

/*
|--------------------------------------------------------------------------
| ROTAS ADMINISTRATIVAS (Categorias / Produtos)
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'where' => ['id'=>'[0-9]+']], function(){

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

        Route::get('{id?}/show', ['as' => 'show_category', 'uses' => 'AdminCategoriesController@show']);

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

        Route::get('{id?}/show', ['as' => 'show_product', 'uses' => 'AdminProductsController@show']);

        Route::get('{id}/destroy', ['as' => 'destroy_product', 'uses' => 'AdminProductsController@destroy']);

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

        Route::get('{id?}/show', ['as' => 'show_user', 'uses' => 'AdminUsersController@show']);

        Route::get('destroy/{id}', ['as' => 'destroy_user', 'uses' => 'AdminUsersController@destroy']);

        Route::get('{id}/edit', ['as' => 'edit_user', 'uses' => 'AdminUsersController@edit']);

        Route::put('{id}/update', ['as' => 'update_user', 'uses' => 'AdminUsersController@update']);

    });

});







