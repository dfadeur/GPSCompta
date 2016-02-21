<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::resource('factures', 'FactureController');
//Sécurité

//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController'
//]);



//Home
Route::get('/', [
    'as'=>'index',
    'uses'=>'HomeController@index'
]);

Route::get('/factures/salesbook', [
    'as'=>'salesbook',
    'uses'=>'FactureController@salesbook'
]);

Route::get('/factures/buybook', [
    'as'=>'buybook',
    'uses'=>'FactureController@buybook'
]);

Route::get('/factures/advance', [
    'as'=>'advance',
    'uses'=>'FactureController@advance'
]);
//facture pdf
Route::get('/createPDF', [
    'as'=>'createPDF',
    'uses'=>'HomeController@createPDF'
]);
Route::get('/factureToPDF', [
    'as'=>'factureToPDF',
    'uses'=>'HomeController@factureToPDF'
]);

Route::resource('factures', 'FactureController');
Route::resource('clients', 'ClientController');
Route::resource('produits', 'ProduitController');
Route::resource('lignes', 'LignesController');