<?php


//accepter les demandes provenant par autre serveurs Angular sans etre bloque par le navigateur
header( "Access-Control-Allow-Origin: *"); 
//methodes authorisées
header( "Access-Control-Allow-Methods: PUT, GET, POST, DELETE" ); 
header( "Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept" );

use Illuminate\Http\Request;

//connexion
Route::post('verifierLog', 'connexionController@verifierLog');

//nouveauCompte
Route::post('nouveauCompte', 'connexionController@creationCompte');

//modifier infos utilisateur
Route::post('modifierInfos', 'GestionCompteController@ModifierInfos');

//supprimer compte
Route::delete('suppCompte/{id}', 'GestionCompteController@SupprimerCompte');

// liste utilisateur par ordre alphabetique
Route::get('listeUtilisateur', 'UtilisateurController@listeUtilisateur');

// liste img
Route::get('listeImages', 'UtilisateurController@listeImages');

// modifie img de l'utilisateur
Route::get('modifierImage/{img}/{idU}', 'UtilisateurController@ModifierImage');