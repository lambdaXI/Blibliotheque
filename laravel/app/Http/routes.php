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

Route::get('/','DashboardController@main')->name('main');// retourne les données de tous mes auteurs inscrit
Route::get('/gallery','DashboardController@gallery')->name('gallery');// retourne les données de tous mes auteurs inscrit

Route::get('/pdfLivre','DashboardController@pdfLivre')->name('pdfLivre');//return la liste des livres en pdf
Route::get('/pdfAuteur','DashboardController@pdfAuteur')->name('pdfAuteur');//return la liste des auteurs en pdf

Route::group(['prefix' => 'backoffice'], function () {
  Route::get('/livre','VueController@livreVue')->name('Livre');// return la vue de tous les livres
  Route::get('/auteur','VueController@auteurVue')->name('auteur');// return la vue de tous les livres

  Route::get('/livreform','AjouterController@livre')->name('formulaireLivre');// return la vue du formulaire des livre
  Route::get('/auteurform','AjouterController@auteur')->name('formulaireAuteur');// return la vue du formulaire des livre

  Route::post('/add-auteur','AjouterController@AddAuteur')->name('AddAuteur');// ajoute des auteurs en post
  Route::post('/add-livre','AjouterController@AddLivre')->name('AddLivre');// ajoute des livres en post

  Route::any('/del-livre/{id}','VueController@DelLivre')->name('DelLivre');// supprime les livres avec parametre id
  Route::any('/del-auteur/{id}','VueController@DelAuteur')->name('DelAuteur');// supprime les livres avec parametre id

  Route::any('/edit-livreForm/{id}','VueController@EditLivreForm')->name('EditLivreForm');// formulaire d edition de livre
  Route::any('/edit-AuteurForm/{id}','VueController@EditAuteurForm')->name('EditAuteurForm');// formulaire d edition de livre

  Route::any('/edit-livre/{id}','VueController@EditLivre')->name('EditLivre');// supprime les livres avec parametre id
  Route::any('/edit-auteur/{id}','VueController@EditAuteur')->name('EditAuteur');// supprime les auteurs avec parametre id
});

Route::get('/auteur-data','AjouterController@AuteurData')->name('AuteurData');// retourne les données de tous mes auteurs en bdd
Route::get('/auteurGroupLiteraire-data','AjouterController@AuteurLiteraireData')->name('AuteurLiteraireData');// recup les nombres d'auteur total par groupe literaire
Route::get('/auteurid-data/{id}','AjouterController@AuteurIdData')->name('AuteurIdData');// retourne les données d'un auteur par rapport au paramettre envoyer
Route::get('/auteurtotal-data','AjouterController@AuteurTotalData')->name('AuteurTotalData');//recup nombre total d auteur
Route::get('/livretotal-data','AjouterController@LivreTotalData')->name('LivreTotalData');//recup nombre total de livre
Route::get('/livrerandom-data','AjouterController@LivreRandomData')->name('LivreRandomData');//recup les donnees d un livre au hazard
Route::get('/livreGroupYear-data','AjouterController@LivreGroupYear')->name('LivreGroupYear');//recup ts mes livres classer par annee

Route::get('/like/{id}','DashboardController@like')->name('like');//permet de liker ou de ne plus like un livre
