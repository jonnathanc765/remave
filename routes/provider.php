<?php
Route::group(['middleware' => ['role:provider']], function () {

    // Pagina principal del dashboard (Proveedor)
    Route::get('/', 'Provider\ProviderController@index')->name('provider')->middleware('verified');
    Route::get('/info', 'ProviderController@info')->name('dashboard.provider.info');
    Route::post('/shop/store', 'ShopController@store')->name('shop.store');

    Route::prefix('orders')->group(function () {
        Route::get('/', 'Provider\OrderController@index')->name('provider.orders.index');
        Route::get('/{order}', 'Provider\OrderController@show')->name('provider.orders.show');
        Route::get('/{order}/cancel', 'Provider\OrderController@cancel')->name('provider.orders.cancel');
        Route::get('/{order}/shipped', 'Provider\OrderController@shipped')->name('provider.orders.shipped');
    });

    // Route::resource('products', 'Provider\ProductController');
    Route::prefix('product')->group(function ()
    {
        Route::get('/', 'Provider\ProductController@index')->name('provider.product.index');
        Route::get('/{postId}/new/', 'Provider\ProductController@new')->name('product.new');
        
        Route::get('/create', 'Provider\ProductController@new')->name('product.create');
        Route::post('/store', 'Provider\ProductController@store')->name('product.store');
        Route::put('/{postId}/update','Provider\ProductController@updatePost')->name('product.update');
    });

    /**
     * Ruta para eliminar los productos atravez de axios
     */
    Route::delete('products/delete/', 'Provider\ProductController@destroy')->name('product.destroy');
    

    /**
     * Ruta para eliminar las imagenes atravez de axios
     */
    Route::delete('images/delete/', 'ProductImageController@destroyImages')->name('images.destroy');
    
    

    Route::post('/subcategories', 'Provider\ProductController@subcategories')->name('ajax.subcategory'); //Recibe los datos por Jquery

    Route::prefix('questions')->group(function () {
        Route::get('/', 'CommentController@index')->name('questions');
        Route::put('/{comment}', 'CommentController@update')->name('questions.update');
    });

    Route::prefix('banners')->group(function ()
    {
        Route::post('store', 'Provider\BannerController@store')->name('provider.banner.store');
        Route::delete('destroy/{banner}', 'Provider\BannerController@destroy')->name('provider.banner.destroy');  
    });

    Route::prefix('post')->group(function ()
    {
        Route::get('/{post}/edit/','Provider\ProductController@edit')->name('provider.product.edit');
        Route::put('/{postId}/update/','Provider\ProductController@updatePost')->name('provider.product.update');
        Route::get('/{post}/show/', 'Provider\ProductController@show')->name('provider.post.show');
        Route::get('/create','Provider\ProductController@create')->name('provider.products.create');
    });
});



Route::prefix('valorations')->group(function () {
    Route::get('/', 'EvaluationProviderController@indice')->name('valorations');
   
});

