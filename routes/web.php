<?php

Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Auth::routes(['verify' => true]);

Route::get('dashboard', 'Auth\LoginController@redirectTo')->name('dashboard')->middleware('auth');

/**
 * Dentro de este middleware van todas las rutas en donde el usuario
 * necesita tener el email verificado para poder ingresar
 */

Route::group(['middleware' => ['verified']], function () {

    Route::prefix('administrator')->group(function () {
        require __DIR__ . '/administrator.php';
    });

    Route::prefix('provider')->group(function () {
        require __DIR__ . '/provider.php';
    });

    Route::prefix('client')->group(function () {
        require __DIR__ . '/client.php';
    });


    
    // Rutas para todo lo relacionado con la configuracion del sistema (Etiquetas meta-etiquetas)

    Route::prefix('configuration')->group(function () {
        Route::get('/', 'ConfigurationController@index')->name('configuration.index');
        Route::post('/store', 'ConfigurationController@storeSEO')->name('configuration.store.SEO');
        Route::post('to_update_information', 'ConfigurationController@updateInformation')->name('information.update');
        Route::post('to_update_our', 'ConfigurationController@updateMission')->name('mission.update');
    });

    //actualizacion y actualizacion

    Route::prefix('user_update')->group(function () {
        Route::post('to_update', 'ConfigurationController@update')->name('user.update');
        Route::post('to_update_details', 'ConfigurationController@updateDetails')->name('user-details.update');
        Route::post('to_update_password', 'ConfigurationController@updateUserPassword')->name('user.password.update');
    });


    // Actualizar redes sociales

    Route::prefix('social_networks')->group(function () {
        Route::post('/store', 'ConfigurationController@storeSocial')->name('social.store');
    });


    // Actualizar informacion de contacto
    Route::prefix('contac')->group(function () {
        Route::post('/store', 'ConfigurationController@storeContac')->name('contac.store');
    });



});

/* Frontend */
// rutas de mercadopago
Route::get('mercadopago', 'MercadoPagoController@process')->name('mercadopago');
Route::get('authorization', 'MercadoPagoController@authorization')->name('authorization');
Route::get('credencial_provider', 'MercadoPagoController@credencial_provider')->name('credencial_provider');
Route::get('logout_mp', 'MercadoPagoController@after')->name('mp.logout');
Route::post('ipnNotification/{orderId}', 'MercadoPagoController@ipnNotification')->name('ipnNotification');



Route::get('product/{code}', 'Frontend\PostController@show')->name('single-product');

Route::resource('categories', 'Frontend\CategoryController');

Route::get('contact', 'Frontend\HomeController@showContact')->name('contact');

Route::get('search', 'Frontend\HomeController@searchPosts')->name('search.product');

Route::get('faqs', 'Frontend\HomeController@faqs')->name('faqs');

Route::post('comment/{postId}', 'Frontend\CommentController@store')->name('comment.store');

Route::post('comment/{postId}/{commentId}', 'Frontend\CommentController@update')->name('comment.update');

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'Frontend\CartController@index')->name('cart.index');

    Route::post('store/{productCode}', 'Frontend\CartController@store')->name('cart.store');

    Route::put('update', 'Frontend\CartController@update')->name('cart.update');

    Route::delete('destroy', 'Frontend\CartController@destroy')->name('cart.destroy');

    Route::get('checkout', 'Frontend\CartController@checkout')->name('cart.checkout');
});


Route::get('payment/{orderCode}', 'PaymentController@confirmation')->name('payment.confirmation');
// Route::get('payment', 'PaymentController@proceed')->name('payment.proceed');
Route::get('payment/successfull/{orderCode}', 'PaymentController@successful')->name('payment.successful');
Route::get('payment/failure/{orderCode}', 'PaymentController@failure')->name('payment.failure');
Route::get('payment/pending/{orderCode}', 'PaymentController@pending')->name('payment.pending');
Route::get('payment/proceed/{orderCode}', 'PaymentController@proceed')->name('payment.proceed');
Route::get('payment/authorization', 'PaymentController@authorization')->name('payment.authorization');


Route::get('shop/{shop}', 'Frontend\HomeController@shop')->name('shop.show');

/**
 * Rutas para la mensajeria instantanea que
 * tiene el proveedor con el cliente
 */

Route::resource('messages', 'MessageController')->middleware('auth');

//Rutas de las valoraciones de los productos vendidos
Route::resource('valuations', 'ValuationController')->middleware('auth');

// Listado de ordes y verlas de forma individual
Route::resource('orders', 'OrderController')->middleware('auth');

// Vista de los banners para agregar un nuevo producto
Route::get('/how-add', 'Frontend\HomeController@howAdd')->name('how-add');

// Vista de los banners para agregar un nuevo producto
Route::get('/how-buy', 'Frontend\HomeController@howBuy')->name('how-buy');

// Vista de los banners para agregar un nuevo producto
Route::get('/shipping', 'Frontend\HomeController@shipping')->name('shipping');

// Vista de los banners para agregar un nuevo producto
Route::get('/terms', 'Frontend\HomeController@terms')->name('terms');


// Vista de los banners para agregar un nuevo producto
Route::get('/forbidden-articles', 'Frontend\HomeController@forbidden')->name('forbidden');

Route::get('descarga-orders/{order_id}', 'OrderController@pdfOrden')->name('orden.pdf');