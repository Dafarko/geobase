<?php

Route::get('/', 'HomeController@index');
Route::get('/country', 'CountryController@index');
Route::get('/all-country', 'CountryController@getAllCountry');
Route::post('/country', 'CountryController@getCountry')->name("get-country");
Route::get('/city', 'CityController@index');
Route::post('/city', 'CityController@getCities')->name("get-cities");
Route::get('/point', 'PointController@index');
Route::post('/point', 'PointController@getNearby')->name("get-nearby");
Route::get('/search', 'SearchController@index');
Route::post('/search', 'SearchController@getSearch')->name("search-params");
Route::get('/country-search', 'CountryController@tableSearch');
Route::get('/city-search', 'CityController@tableSearch');
