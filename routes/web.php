<?php


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

Route::get('/', 'Index\PageController@home')->name('page.home');

Route::get('/san-pham.html', 'Index\PageController@products')
    ->name('products');
Route::get('/{slug}-{id}.html', 'ProductController@view')->where(['slug' => '[a-z]+', 'id' => '[0-9]+'])
    ->name('product');
Route::group(['namespace' => 'Index'], function () {
    //contact
    Route::get('/lien-he.html', 'ContactController@index')
        ->name('contact');
    Route::post('/lien-he.html', 'ContactController@store');

    //search page
    Route::get('/search', 'SearchController@index')->name('search');

    //tag
    Route::get('/tag/{name}-{id}.html', 'TagController@index')->where(['name' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('tag');
});

Route::group(['namespace' => 'Index'], function () {
    //tin tuc
    Route::group(['prefix' => 'tin-tuc'], function () {
        Route::get('.html', 'NewsController@index')->name('news');

        Route::get('/{slug}-{id}.html', 'NewsController@view')
            ->where(['slug' => '[a-z-]+', 'id' => '[0-9-]+'])->name('news.view');
        Route::get('/{slug}', 'NewsController@view')->where(['slug' => '[a-z-]+'])->name('news.category');
    });


    //product
    Route::get('/category/{name}-{id}.html', 'ProductCategoryController@index')
        ->where(['name' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('product.category');

    Route::get('/{name}-{id}.html', 'ProductController@index')
        ->where(['name' => '[a-z-]+', 'id' => '[0-9]+'])
        ->name('page.product');

});

Route::get('/test', function () {
    echo '<pre>';
    $image = \App\Model\Image::find(115);
    echo media_path($image->file);
    \Illuminate\Support\Facades\Storage::delete($image->medium);
    echo '</pre>';
});

//Admin Login
Route::get('/admin/login', 'Admin\HomeController@login')->name('admin.login');
Route::post('/admin/login', 'Admin\LoginController@login');
Route::get('/admin/logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::get('/admin/login/facebook', 'Admin\SocialAuthController@redirectToProvider')->name('admin.login.facebook');
Route::get('/admin/login/facebook/callback', 'Admin\SocialAuthController@handleProviderCallback')
    ->name('admin.login.facebook.callback');


//Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('/', 'AdminController@index')->name('admin.home');

    //admin/option
    Route::group(['prefix' => 'option'], function () {
        Route::get('/', 'OptionController@index')->name('admin.option');
        Route::post('/', 'OptionController@update');
        Route::get('/create', 'OptionController@create')->name('admin.option.create');
        Route::post('/create', 'OptionController@store');
    });

    //admin/news
    Route::group(['namespace' => 'News', 'prefix' => 'news'], function () {
        Route::get('/', 'NewsController@index')
            ->name('admin.news');

        //admin/news/add
        Route::get('/create', 'NewsController@create')->name('admin.news.create');
        Route::post('/create', 'NewsController@store');

        Route::get('/edit/{id}', 'NewsController@edit')->where(['id' => '[0-9]+'])->name('admin.news.edit');
        Route::post('/edit/{id}', 'NewsController@update')->where(['id' => '[0-9]+']);


        Route::post('/ajax/{id}', 'NewsController@ajax')->where(['id' => '[0-9]+'])->name('admin.news.ajax');
        //admin/news/edit
        Route::group(['prefix' => 'edit'], function () {
            //Edit


            Route::post('/{id}/postCategory', 'EditController@postCategory')->where(['id' => '[0-9]+']);
            Route::post('/{id}/postTags', 'EditController@postTags')->where(['id' => '[0-9]+']);
            Route::post('/{id}/postMedia', 'EditController@postMedia')->where(['id' => '[0-9]+']);
            Route::post('/{id}/mediaList', 'EditController@mediaList')->where(['id' => '[0-9]+']);
            //open modal of media
            Route::post('/openMedia', 'EditController@openMedia')->where(['id' => '[0-9]+']);
            //set image_id for news
            Route::post('/{id}/setFeatured', 'EditController@setFeatured')->where(['id' => '[0-9]+']);
        });


        //admin/news/category
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@index')
                ->name('admin.news.category');
            Route::get('/create', 'CategoryController@create')->name('admin.news.category.create');
            Route::post('/create', 'CategoryController@store');
            Route::get('/edit/{id}', 'CategoryController@edit')->where(['id' => '[0-9]+'])
                ->name('admin.news.category.edit');
            Route::post('/edit/{id}', 'CategoryController@update')->where(['id' => '[0-9]+'])
                ->name('admin.news.category.edit');
            Route::get('/destroy/{id}', 'CategoryController@destroy')->where(['id' => '[0-9]+'])
                ->name('admin.news.category.destroy');
        });

    });

    //admin/tags
    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', 'TagController@index')->name('admin.tags');
        Route::get('/create', 'TagController@create')->name('admin.tags.create');
        Route::post('/store', 'TagController@store');
        Route::get('/edit/{id}', 'TagController@edit')->where(['id' => '[0-9]+'])->name('admin.tags.edit');
        Route::post('/update/{id}', 'TagController@update')->where(['id' => '[0-9]+']);
        Route::get('/destroy/{id}', 'TagController@destroy')->where(['id' => '[0-9]+'])->name('admin.tags.destroy');
    });

    //admin/product
    Route::group(['namespace' => 'Product', 'prefix' => 'product'], function () {
        Route::get('/', 'ProductController@index')
            ->name('admin.product');

        //admin/product/create
        Route::get('/create', 'ProductController@create')
            ->name('admin.product.create');
        Route::post('/store', 'ProductController@store');

        //admin/product/edit
        Route::group(['prefix' => 'edit'], function () {
            Route::get('/{id}', 'ProductController@edit')->where(['id' => '[0-9]+'])
                ->name('admin.product.edit');
            Route::get('/quantity/{id}', 'UnitController@index')->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.quantity');
            Route::post('/quantity/{id}', 'UnitController@store')->where(['id' => '[0-9]+']);
            Route::post('/quantity/{id}/general', 'UnitController@storeGeneral')->where(['id' => '[0-9]+']);


            //ajax
            Route::post('/{id}/ajax', 'ProductController@ajax')->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.ajax');


            //file upload
            Route::post('/postMedia/{id}', 'ProductController@postMedia')
                ->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.postMedia');
            Route::post('/{id}', 'ProductController@update')->where(['id' => '[0-9]+']);
            Route::post('/{id}/postCategory', 'EditController@postCategory')->where(['id' => '[0-9]+']);
            Route::post('/{id}/postTags', 'EditController@postTags')->where(['id' => '[0-9]+']);
            Route::post('/{id}/postMedia', 'EditController@postMedia')->where(['id' => '[0-9]+']);
            Route::post('/{id}/mediaList', 'EditController@mediaList')->where(['id' => '[0-9]+']);
            //open modal of media
            Route::post('/openMedia', 'EditController@openMedia')->where(['id' => '[0-9]+']);
            //set image_id for news
            Route::post('/{id}/setFeatured', 'EditController@setFeatured')->where(['id' => '[0-9]+']);


            //get panel
            Route::get('/panel/image/{id}', 'ProductController@getPanelImage')->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.panel.image');
            Route::get('/panel/tag/{id}', 'ProductController@getPanelTag')->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.panel.tag');
            Route::get('/panel/imageitem/{image_id}', 'ProductController@getPanelImageItem')->where(['image_id' => '[0-9]+'])
                ->name('admin.product.edit.panel.imageitem');
            Route::get('/panel/color/{id}', 'ProductController@getPanelColor')->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.panel.color');

            //color
            Route::post('/post/color/{id}', 'ProductController@postAddColor')->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.add.color');
            Route::post('/color/delete/{id}', 'ProductController@postColorDelete')
                ->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.color.delete');
            Route::post('/color/name/{id}', 'ProductController@postColorName')
                ->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.color.name');

            //size
            Route::post('/size/add/{id}', 'ProductController@postSizeAdd')
                ->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.size.add');
            Route::get('/size/load/{id}', 'ProductController@getSizeLoad')->where(['id' => '[0-9]+'])
                ->name('admin.product.edit.size.load');
        });


        //admin/product/category
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', 'CategoryController@index')
                ->name('admin.product.category');
            Route::get('/create', 'CategoryController@create')
                ->name('admin.product.category.create');
            Route::post('/create', 'CategoryController@store');
            Route::get('/edit/{id}', 'CategoryController@edit')
                ->where(['id' => '[0-9]+'])
                ->name('admin.product.category.edit');
            Route::post('/edit/{id}', 'CategoryController@update')
                ->where(['id' => '[0-9]+'])
                ->name('admin.product.category.edit');
            Route::get('/delete/{id}', 'CategoryController@destroy')
                ->where(['id' => '[0-9]+'])
                ->name('admin.product.category.destroy');
        });

        //admin/product/tag
        Route::group(['prefix' => 'tags'], function () {
            Route::get('/', 'TagsController@index')
                ->name('admin.product.tag');
            Route::get('/create', 'TagsController@create')
                ->name('admin.product.tag.create');
            Route::post('/create', 'TagsController@store');
            Route::get('/edit/{id}', 'TagsController@edit')
                ->where(['id' => '[0-9]+'])
                ->name('admin.product.tag.edit');
            Route::post('/edit/{id}', 'TagsController@update')
                ->where(['id' => '[0-9]+']);
            Route::get('/destroy/{id}', 'TagsController@destroy')
                ->where(['id' => '[0-9]+'])
                ->name('admin.product.tag.destroy');
        });

    });

    //admin/size
    Route::group(['prefix' => 'size'], function () {
        Route::get('/', 'SizeController@index')
            ->name('admin.size');
        Route::get('/create', 'SizeController@create')
            ->name('admin.size.create');
        Route::post('/store', 'SizeController@store')
            ->name('admin.size.store');
        Route::get('/edit/{id}', 'SizeController@edit')
            ->where(['id' => '[0-9]+'])
            ->name('admin.size.edit');
        Route::post('/edit/{id}', 'SizeController@update')
            ->where(['id' => '[0-9]+']);
        Route::get('/destroy/{id}', 'SizeController@destroy')
            ->where(['id' => '[0-9]+'])
            ->name('admin.size.destroy');
    });

    //admin/media
    Route::group(['prefix' => 'media'], function () {
        Route::get('/', 'MediaController@index')
            ->name('admin.media');
        Route::get('/add', 'MediaController@add')
            ->name('admin.media.add');
        Route::post('/add', 'MediaController@postAdd')
            ->name('admin.media.add');
        Route::post('/modal', 'MediaController@getModalMedia');
        Route::post('/edit/{id}', 'MediaController@postEdit')
            ->where(['id' => '[0-9]+']);
        Route::post('/destroy', 'MediaController@destroy')
            ->name('admin.media.destroy');

    });

    //admin/user
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('admin.user');
        Route::get('/create', 'UserController@create')->name('admin.user.create');
        Route::post('/store', 'UserController@store')->name('admin.user.store');
        Route::get('/edit/{id}', 'UserController@edit')->where(['id' => '[0-9]+'])->name('admin.user.edit');
        Route::post('/update/{id}', 'UserController@update')->where(['id' => '[0-9]+'])->name('admin.user.update');
        Route::get('/destroy/{id}', 'UserController@destroy')->where(['id' => '[0-9]+'])->name('admin.user.destroy');
    });

    Route::group(['prefix' => 'role'], function () {
        Route::get('/', 'RoleController@index')->name('admin.role');
        Route::get('/create', 'RoleController@create')->name('admin.role.create');
        Route::post('/store', 'RoleController@store')->name('admin.role.store');
        Route::get('/edit/{id}', 'RoleController@edit')->where(['id' => '[0-9]+'])->name('admin.role.edit');
        Route::post('/update', 'RoleController@update')->name('admin.role.update');
        Route::get('/destroy/{id}', 'RoleController@destroy')->where(['id' => '[0-9]+'])->name('admin.role.destroy');
    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', 'ContactController@index')->name('admin.contact');
        Route::get('/{id}', 'ContactController@view')->where(['id' => '[0-9]+'])->name('admin.contact.view');
        Route::post('/{id}/reply', 'ContactController@reply')->where(['id' => '[0-9]+'])->name('admin.contact.reply');
        Route::post('/ajax', 'ContactController@ajax')->name('admin.contact.ajax');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
