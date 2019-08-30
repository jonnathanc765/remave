<?php

Route::group(['middleware' => ['role:superadmin']], function () {

    // Pagina principal del dashboard (Administrador)
    Route::get('/', 'AdministratorController@index')->name('administrator')->middleware('verified');

    // Rutas para los reportes
    Route::prefix('reports')->group(function () {
        Route::get('/', 'ReportController@index')->name('reports.index');
    });

    

    //rutas de las preguntas frecuentes
    Route::resource('faqs', 'FaqController');

    Route::prefix('banners')->group(function () {
        Route::get('/list/{position?}', 'BannerController@index')->name('banner'); //Listar banners
        Route::get('/edit/{atras}/{position}', 'BannerController@edit')->name('banner.edit'); //Cambiar el banner
        Route::put('/list/{atras}/{banner}/{position}', 'BannerController@update')->name('banner.update'); //Actualizar el banner
        Route::get('/select/{position}', 'BannerController@select')->name('banner.select');
        Route::get('unset/banner/{banner}', 'BannerController@unset')->name('banner.unset');
        Route::put('published/{banner}/{position}', 'BannerController@published')->name('banner.published'); //Agregar un banner a una posicion

        //Banner de las Categorias
        Route::get('/list/category/{position}', 'CategoryController@bannerIndex')->name('banner.category'); //Lista de los banners de categorias publicadas
        Route::get('/create/banner/category', 'CategoryController@createBanner')->name('banner.category.create'); //Agregar un banner nuevo
        Route::post('/list/category', 'CategoryController@storeBanner')->name('banner.category.store'); //Guardar foto de banner de categoria y publicarla
        Route::get('edit/banner/category/{atras}', 'CategoryController@editBanner')->name('banner.category.editBanner');
        Route::put('/list/category/{atras}/{banner}/{position}', 'CategoryController@updateBanner')->name('banner.category.update');

        Route::put('edit/banner/category/{banner}', 'CategoryController@addBanner')->name('banner.category.addBanner');
        Route::post('add/banner/category/{atras}', 'CategoryController@addBannerCategory')->name('banner.category.add'); //Agregar foto de categoria sin publicarla

        Route::get('shop', 'BannerController@shop')->name('banner.shop.create');
        Route::post('shop', 'BannerController@shopStore')->name('banner.shop.store');
        
    });

    // Rutas para los productos (Administraor)
    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index')->name('products');
        Route::delete('/eliminar/{product}', 'ProductController@destroy')->name('product.destroy');
        Route::get('/show/{product}', 'ProductController@show')->name('product.show');
    });

    // Rutas para los clientes (Administrador)
    Route::resource('clients', 'ClientController');

    // Rutas para el proveedor (Administrador)
    Route::prefix('provider')->group(function () {
        Route::get('/', 'ProviderController@index')->name('providers');
        Route::delete('/eliminar/{providers}', 'ProviderController@destroy')->name('provider.destroy');
        Route::get('/show/{user}', 'ProviderController@show')->name('provider.show');
    });

    // Categorias del administrador
    Route::prefix('categories')->group(function () {

        Route::get('/', 'CategoryController2@index')->name('admin.categories.index');

        Route::post('store', 'CategoryController2@store')->name('admin.categories.store');

        Route::get('create', 'CategoryController2@create')->name('admin.categories.create');

        Route::delete('{categoryId}', 'CategoryController2@destroy')->name('admin.categories.destroy');

        Route::get('{categoryId}', 'CategoryController2@show')->name('admin.categories.show');

        Route::put('{categoryId}', 'CategoryController2@update')->name('admin.categories.update');

        Route::get('{categoryId}/edit', 'CategoryController2@edit')->name('admin.categories.edit');
        
    });

    //rutas para la gestion de las subcategorias.
    Route::resource('subcategories', 'SubCategoryController2');


    //administracion de pago
    Route::prefix('add_paymnet')->group(function () {
        Route::get('/list', 'ConfigurationController@ver')->name('payments');
        Route::post('/list', 'ConfigurationController@store')->name('payment.store');
        Route::post('/store', 'ConfigurationController@saveToken')->name('saveToken');
    });

    
    

    // Rutas para los productos (Administrador)
    Route::prefix('products')->group(function () {
        Route::get('/list', 'ProductController@index')->name('products.index');
    });

    

});

Route::prefix('testimonies')->group(function () {
    Route::get('/list', 'TestimoniesController@index')->name('testimonies');
    Route::get('/show/{testimonie}', 'TestimoniesController@show')->name('testimonie.show');
    Route::delete('/eliminar/{testimonies}', 'TestimoniesController@destroy')->name('testimonie.destroy');
});

Route::prefix('evaluationprovider')->group(function () {
    Route::get('/list', 'EvaluationProviderController@index')->name('evaluationprovider');

});
