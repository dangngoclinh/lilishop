<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'news'], function () {
    Route::get('tags', 'Api\NewsController@tags')
        ->name('api.news.tags');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('tags', 'Api\ProductController@tags')
        ->name('api.product.tags');
    Route::get('sizes', 'Api\ProductController@sizes')
        ->name('api.product.sizes');
});

Route::group(['prefix' => 'tags'], function () {
    Route::get('searchSelect2', 'Api\TagsController@searchSelect2')->name('api.tags.searchSelect2');
});
