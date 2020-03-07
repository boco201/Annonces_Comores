<?php

Route::group(['prefix'  =>  'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

    //Route::resource('/products', 'Admin\AdminProductsController');
    /************************Routes categories************************* */
    Route::get('/products', 'Admin\AdminProductsController@index')->name('admin.products.index');
    Route::get('/products/create', 'Admin\AdminProductsController@create')->name('admin.products.create');
    Route::post('/products', 'Admin\AdminProductsController@store')->name('admin.products.store');
    Route::get('/products/{product}/edit', 'Admin\AdminProductsController@edit')->name('admin.products.edit');
    Route::patch('/products/{product}', 'Admin\AdminProductsController@update')->name('admin.products.update');
    Route::delete('/products/{product}', 'Admin\AdminProductsController@destroy')->name('admin.products.destroy');
    //Route::resource('/categories', 'Admin\AdminCategoriesController');
    Route::get('/categories', 'Admin\AdminCategoriesController@index')->name('admin.categories.index');
    Route::get('/categories/{category}/edit', 'Admin\AdminCategoriesController@edit')->name('admin.categories.edit');
    Route::patch('/categories/{category}', 'Admin\AdminCategoriesController@update')->name('admin.categories.update');
    route::get('/categories/create', 'Admin\AdminCategoriesController@create')->name('admin.categories.create');
    Route::post('/categories', 'Admin\AdminCategoriesController@store')->name('admin.categories.store');
    Route::delete('/categories/{category}', 'Admin\AdminCategoriesController@destroy')->name('admin.categories.destroy');

   });

});

/*-----------------------------------------------------------------------------------*/
//Route userprofil
Route::get('/userprofil', 'UserProfilController@index')->name('site.userprofil.index');
Route::get('/userprofil/create', 'UserProfilController@create')->name('site.userprofil.create');
Route::post('/userprofil/create', 'UserProfilController@store')->name('site.userprofil.store');
Route::get('/userprofil/{product}/edit', 'UserProfilController@edit')->name('site.userprofil.edit');
Route::get('/userprofil/show/{product}', 'UserProfilController@show')->name('site.userprofil.show');
Route::patch('/userprofil/{product}', 'UserProfilController@update')->name('site.userprofil.update');
Route::delete('/userprofil/{product}', 'UserProfilController@destroy')->name('site.userprofil.destroy');

Route::get('/userprofil/stripe', 'UserProfilController@OverStripe')->name('auth.register');
