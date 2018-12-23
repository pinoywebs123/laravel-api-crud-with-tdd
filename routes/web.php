<?php

Route::get('/', function(){
	return 'test';
});

// Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
// Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
// Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));