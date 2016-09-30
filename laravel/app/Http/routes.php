<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
Partie BACK
| AjouterController gere le formulaire d'ajout et l ajout d'auteur et livre
| VueController gere l'edition, la suprression des auteur et livre
| DashboardController gere les statistiques du serveur

Partie FRONT
| FrontController gere ts le front et linteraction des donnees du serveur avec le client
*/

//Front--------------------------------------------
Route::get('/index','FrontController@main')->name('mainFront');// retourne les données de tous mes auteurs inscrit
Route::any('/panierplus/{id}','FrontController@panierplus')->name('panierplus');// retourne les données de tous mes auteurs inscrit
Route::any('/paniermoins/{id}','FrontController@paniermoins')->name('paniermoins');// retourne les données de tous mes auteurs inscrit
Route::any('/recup-panier','FrontController@recupPanier')->name('recupPanier');// retourne les données de ma session panier
Route::any('/vue-plus/{id}','FrontController@vuePlus')->name('vuePlus');// retourne les données de ma session panier
//------------------------------------------------------------

//back----------------------------------------------------------
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
//---------------------------------------------

//Group Requete SQL------------------------------------------
Route::get('/auteur-data','AjouterController@AuteurData')->name('AuteurData');// retourne les données de tous mes auteurs en bdd
Route::get('/livre-data','AjouterController@LivreData')->name('LivreData');// retourne les données de tous mes auteurs en bdd
Route::get('/auteurGroupLiteraire-data','AjouterController@AuteurLiteraireData')->name('AuteurLiteraireData');// recup les nombres d'auteur total par groupe literaire
Route::get('/auteurid-data/{id}','AjouterController@AuteurIdData')->name('AuteurIdData');// retourne les données d'un auteur par rapport au paramettre envoyer
Route::get('/auteurtotal-data','AjouterController@AuteurTotalData')->name('AuteurTotalData');//recup nombre total d auteur
Route::get('/livretotal-data','AjouterController@LivreTotalData')->name('LivreTotalData');//recup nombre total de livre
Route::get('/livrerandom-data','AjouterController@LivreRandomData')->name('LivreRandomData');//recup les donnees d un livre au hazard
Route::get('/livreGroupYear-data','AjouterController@LivreGroupYear')->name('LivreGroupYear');//recup ts mes livres classer par annee

//--------------------------------------------------

Route::get('/like/{id}','DashboardController@like')->name('like');//permet de liker ou de ne plus like un livre
