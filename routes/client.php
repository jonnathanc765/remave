<?php

Route::group(['middleware' => ['role:client']], function () {
    // Pagina principal del dashboard (Cliente)
    Route::get('/', 'Client\ClientController@index')->name('dashboard.client')->middleware('verified');
    Route::get('/info', 'Client\ClientController@info')->name('dashboard.client.info');

    Route::resource('shops', 'ShopController');

    Route::get('/orders', 'Client\OrderController@index')->name('client.orders.index');
    Route::get('/orders/{code}', 'Client\OrderController@show')->name('client.orders.show');
    Route::get('/orders/{order}/cancel', 'Client\OrderController@cancel')->name('client.order.cancel');
    Route::get('orders/{order}/markAsPaid', 'Client\OrderController@markASPaid')->name('client.orders.paid');
    Route::get('orders/{order}/orderReceived', 'Client\OrderController@orderReceived')->name('client.orders.received');

    Route::get('/mp/{shop}', 'ShopController@after')->name('shop.after');
});