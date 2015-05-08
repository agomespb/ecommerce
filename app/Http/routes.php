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

Route::get('/', 'WelcomeController@index');

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
Route::pattern('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| ROTAS ADMINISTRATIVAS (Categorias / Produtos)
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin/categories'], function(){

    /*
    |--------------------------------------------------------------------------
    | Categorias
    |--------------------------------------------------------------------------
    |
    | 01 - categories: Lista todas as categorias de database.sqlite
    | 02 - new_category: Formulário para inserir uma nova categoria em database.sqlite
    | 03 - show_category: Realiza uma consulta por id da categoria.
    |
    */
    Route::get('', ['as' => 'categories', 'uses' => 'AdminCategoriesController@index']);

    Route::get('create', ['as' => 'new_category', 'uses' => 'AdminCategoriesController@create']);

    Route::get('{id?}/show', ['as' => 'show_category', 'uses' => 'AdminCategoriesController@show']);

});

Route::group(['prefix' => 'admin/products'], function(){

    /*
    |--------------------------------------------------------------------------
    | Produtos
    |--------------------------------------------------------------------------
    |
    | 01 - products: Lista todos os produtos de database.sqlite
    | 02 - new_product: Formulário para inserir um novo produto em database.sqlite
    | 03 - show_product: Realiza uma consulta por id do produto.
    |
    */
    Route::get('', ['as' => 'products', 'uses' => 'AdminProductsController@index']);

    Route::get('create', ['as' => 'new_product', 'uses' => 'AdminProductsController@create']);

    Route::get('{id?}/show', ['as' => 'show_product', 'uses' => 'AdminProductsController@show']);

});






