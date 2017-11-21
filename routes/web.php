<?php

Route::get('/', 'HomeController@index');
Route::get('/country', 'CountryController@index');
Route::get('/all-country', 'CountryController@getAllCountry');
Route::post('/country', 'CountryController@getCountry')->name("get-country");
Route::get('/city', 'CityController@index');
Route::get('/point', 'PointController@index');
Route::get('/search', 'SearchController@index');
Route::get('/country-search', 'CountryController@liveSearch')->name("live-search");