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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'ajouter'], function () {

  Route::any('/livre','AjouterController@livre')->name('formulaireLivre');// return la vue du formulaire des livre
  Route::any('/auteur','AjouterController@auteur')->name('formulaireAuteur');// return la vue du formulaire des livre
  Route::any('/add-auteur','AjouterController@AddAuteur')->name('AddAuteur');// return la vue du formulaire des livre

});

Route::any('/auteur-data','AjouterController@AuteurData')->name('AuteurData');// retourne les données de tous mes auteurs inscrit
