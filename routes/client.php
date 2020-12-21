<?php
/* 
  Routes pour les clients
*/

Route::get('/','ClientController@home');

Route::get('/shop','ClientController@shop');

Route::get('/panier','ClientController@panier');

Route::get('/payement','ClientController@payement');