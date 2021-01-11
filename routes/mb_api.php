<?php

/*
|----------------------------------------------------------------
|   MB Routes
|----------------------------------------------------------------
*/
Route::group(array('namespace' => 'mb'), function(){

    Route::group(['middleware' => 'jwt.verify'], function(){
        
        /* -- Orders -- */
        Route::get('orders', 'OrderController@index');
        Route::get('orders/{order_id}', 'OrderController@show');
        Route::post('orders/{order_id}/inquire', 'OrderController@inquire');
        Route::get('orders/{order_id}/inq', 'OrderController@checkInquiry');
        Route::get('orders/inquiry/{inq_id}', 'OrderController@showInquiry');

        /* -- Address -- */
        Route::get('address', 'AddressController@index');
        Route::post('address/store', 'AddressController@store');
        Route::get('address/{adr_id}/edit', 'AddressController@edit');
        Route::put('address/{adr_id}/update', 'AddressController@update');
        Route::delete('address/{adr_id}/destroy', 'AddressController@destroy');

        /* -- Cards -- */
        Route::get('cards', 'CustomerCardController@index');
        Route::post('card/store', 'CustomerCardController@store');
        Route::get('card/{card_id}/edit', 'CustomerCardController@edit');
        Route::put('card/{card_id}/update', 'CustomerCardController@update');
        Route::delete('card/{card_id}/destroy', 'CustomerCardController@destroy');
                
        
    });
});