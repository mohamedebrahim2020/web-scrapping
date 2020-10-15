<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@index');
Route::get('/web', 'FrontController@web');
Route::get('/article-details/{id}', 'FrontController@getArticleDetails');
Route::get('/category/{id}', 'FrontController@getCategory');
 
Route::group(['prefix' => 'dashboard','middleware' => 'auth'], function() {
    Route::resource('/websites', 'WebsitesController');
    Route::resource('/categories', 'CategoriesController');
    Route::patch('/links/set-item-schema', 'LinksController@setItemSchema');
    Route::post('/links/scrape', 'LinksController@scrape');
    Route::resource('/links', 'LinksController');
    Route::resource('/item-schema', 'ItemSchemaController');
    Route::resource('/articles', 'ArticlesController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


