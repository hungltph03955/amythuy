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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//-----------------------------------------HomePage----------------------------------------

Route::get('', 'HomePage\HomeController@index')->name('homepage.index');


Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('getLogin');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Admin\Auth\LoginController@getLogout')->name('admin.logout');
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\CategoryController@index')->name('admin.home');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('product', 'Admin\ProductController');
    Route::get('delimg/{id}', ['as' => 'admin.product.getDelImg', 'uses' => 'Admin\ProductController@getDelImg']);
    Route::get('delcolor/{id}', ['as' => 'admin.product.getDelColor', 'uses' => 'Admin\ProductController@getDelColor']);
    Route::get('delete/{id}', ['as' => 'admin.product.delete', 'uses' => 'Admin\ProductController@deleteProduct']);

    Route::resource('sale', 'Admin\SaleController');
    Route::get('sale/create/{id}', 'Admin\SaleController@create');
    Route::resource('image', 'Admin\ImageController');
    Route::get('image/create/{id}', 'Admin\ImageController@create');
    Route::post('image/create/{id}', 'Admin\ImageController@store')->name('image.upload');
    Route::resource('customer', 'Admin\CustomerController');
    Route::resource('comment', 'Admin\CommentController');
    Route::resource('information', 'Admin\InformationController');
    Route::resource('order', 'Admin\OrderController');
    Route::resource('order-detail', 'Admin\OrderDetailController');
    Route::resource('imagebanner', 'Admin\ImagebannerController');
    Route::get('deleteimagebanner/{id}', ['as' => 'admin.imagebanner.deleteimagebanner', 'uses' => 'Admin\ImagebannerController@destroy']);

    Route::group(['prefix' => 'color'], function () {
        Route::get('list', ['as' => 'getColorList', 'uses' => 'Admin\ColorController@getColorList']);
        Route::get('add', ['as' => 'getColorAdd', 'uses' => 'Admin\ColorController@getColorAdd']);
        Route::post('add', ['as' => 'postColorAdd', 'uses' => 'Admin\ColorController@postColorAdd']);
        Route::get('delete/{id}', ['as' => 'getColorDel', 'uses' => 'Admin\ColorController@getColorDel'])->where('id', '[0-9]+');
        Route::get('edit/{id}', ['as' => 'getColorEdit', 'uses' => 'Admin\ColorController@getColorEdit'])->where('id', '[0-9]+');;
        Route::post('edit/{id}', ['as' => 'postColorEdit', 'uses' => 'Admin\ColorController@postColorEdit']);
    });

    Route::group(['prefix' => 'sizes'], function () {
        Route::get('list', ['as' => 'getSizesList', 'uses' => 'Admin\SizeController@getSizesList']);
        Route::get('add', ['as' => 'getSizesAdd', 'uses' => 'Admin\SizeController@getSizesAdd']);
        Route::post('add', ['as' => 'postSizesAdd', 'uses' => 'Admin\SizeController@postSizesAdd']);
        Route::get('delete/{id}', ['as' => 'getSizesDel', 'uses' => 'Admin\SizeController@getSizesDel'])->where('id', '[0-9]+');
        Route::get('edit/{id}', ['as' => 'getSizesEdit', 'uses' => 'Admin\SizeController@getSizesEdit'])->where('id', '[0-9]+');;
        Route::post('edit/{id}', ['as' => 'postSizesEdit', 'uses' => 'Admin\SizeController@postSizesEdit']);
    });

    Route::group(['prefix' => 'collections'], function () {
        Route::get('list', ['as' => 'getCollectionsList', 'uses' => 'Admin\CollectionController@getCollectionsList']);
        Route::get('add', ['as' => 'getCollectionsAdd', 'uses' => 'Admin\CollectionController@getCollectionsAdd']);
        Route::post('add', ['as' => 'postCollectionsAdd', 'uses' => 'Admin\CollectionController@postCollectionsAdd']);
        Route::get('delete/{id}', ['as' => 'getCollectionsDel', 'uses' => 'Admin\CollectionController@getCollectionsDel'])->where('id', '[0-9]+');
        Route::get('edit/{id}', ['as' => 'getCollectionsEdit', 'uses' => 'Admin\CollectionController@getCollectionsEdit'])->where('id', '[0-9]+');;
        Route::post('edit/{id}', ['as' => 'postCollectionsEdit', 'uses' => 'Admin\CollectionController@postCollectionsEdit']);
    });


    Route::group(['prefix' => 'materials'], function () {
        Route::get('list', ['as' => 'getMaterialsList', 'uses' => 'Admin\MaterialController@getMaterialsList']);
        Route::get('add', ['as' => 'getMaterialsAdd', 'uses' => 'Admin\MaterialController@getMaterialsAdd']);
        Route::post('add', ['as' => 'postMaterialsAdd', 'uses' => 'Admin\MaterialController@postMaterialsAdd']);
        Route::get('delete/{id}', ['as' => 'getMaterialsDel', 'uses' => 'Admin\MaterialController@getMaterialsDel'])->where('id', '[0-9]+');
        Route::get('edit/{id}', ['as' => 'getMaterialsEdit', 'uses' => 'Admin\MaterialController@getMaterialsEdit'])->where('id', '[0-9]+');;
        Route::post('edit/{id}', ['as' => 'postMaterialsEdit', 'uses' => 'Admin\MaterialController@postMaterialsEdit']);
    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('list', ['as' => 'getNewsList', 'uses' => 'Admin\NewController@getNewsList']);
        Route::get('add', ['as' => 'getNewsAdd', 'uses' => 'Admin\NewController@getNewsAdd']);
        Route::post('add', ['as' => 'postNewsAdd', 'uses' => 'Admin\NewController@postNewsAdd']);
        Route::get('delete/{id}', ['as' => 'getNewsDel', 'uses' => 'Admin\NewController@getNewsDel'])->where('id', '[0-9]+');
        Route::get('edit/{id}', ['as' => 'getNewsEdit', 'uses' => 'Admin\NewController@getNewsEdit'])->where('id', '[0-9]+');;
        Route::post('edit/{id}', ['as' => 'postNewsEdit', 'uses' => 'Admin\NewController@postNewsEdit']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('list', ['as' => 'getUsersList', 'uses' => 'Admin\UserController@getUsersList']);
        Route::get('add', ['as' => 'getUsersAdd', 'uses' => 'Admin\UserController@getUsersAdd']);
        Route::post('add', ['as' => 'postUsersAdd', 'uses' => 'Admin\UserController@postUsersAdd']);
        Route::get('delete/{id}', ['as' => 'getUsersDel', 'uses' => 'Admin\UserController@getUsersDel'])->where('id', '[0-9]+');
        Route::get('edit/{id}', ['as' => 'getUsersEdit', 'uses' => 'Admin\UserController@getUsersEdit'])->where('id', '[0-9]+');;
        Route::post('edit/{id}', ['as' => 'postUsersEdit', 'uses' => 'Admin\UserController@postUsersEdit']);
    });

});


Route::get('show/{slug?}/{id?}', 'HomePage\HomeController@show')->name('home.detail');
Route::post('addCart/{id?}', 'HomePage\CartController@store')->name('home.cart');
Route::get('cart', 'HomePage\CartController@index')->name('home.cart');
Route::post('updateItem/{id?}', 'HomePage\CartController@update')->name('home.cart.update');
Route::post('destroy/{id?}', 'HomePage\CartController@destroy')->name('home.cart.destroy');
Route::get('blog', 'HomePage\HomeController@blog');

//-----------------------------------------------Order--------------------------------------
Route::group(['prefix' => 'order'], function () {
    Route::get('checkout', 'Order\OrderController@checkout')->name('order.checkout');
    Route::post('infoCus', 'Order\OrderController@store')->name('order.infoCus');
    Route::get('confirm', 'Order\OrderController@confirm')->name('order.confirm');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{slug}', 'Customer\CategoryController@show');
Route::get('/about', 'Customer\AboutMeController@aboutMe');
Route::get('/contact', 'Customer\AboutMeController@getContact');
Route::post('/contact', 'Customer\AboutMeController@postContact');

