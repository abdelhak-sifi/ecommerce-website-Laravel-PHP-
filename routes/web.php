<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//URL's Client
Route::get('/','ClientController@home');
Route::get('/shop','ClientController@shop');
Route::get('/panier','ClientController@panier');
Route::get('/payement','ClientController@payement');
Route::get('/test','ClientController@test');
Route::get('/shop/categorie/{nom_categorie}','ProduitController@ChoixCategorie');
Route::get('/ajouter-panier/{id}','ClientController@AjouterAuPanier');
//Admin URL's
Route::get('/admin','AdminController@admin');
Route::get('/ajouter-categorie','AdminController@AjouterCategorie');
Route::get('/ajouter-produit','AdminController@AjouterProduit');
Route::get('/ajouter-slider','AdminController@AjouterSlider');
Route::get('/categories','AdminController@AfficherCategroeis');
Route::get('/produits','AdminController@AfficherProduits');
Route::get('/sliders','AdminController@AfficherSliders');
Route::get('/commandes','AdminController@AfficherCommandes');
Route::post('/sauvgarder-produit','ProduitController@SauvgarderProduit');
Route::post('/sauvgarder-categorie','CategorieController@SauvgarderCategorie');
Route::post('/sauvgarder-slider','SliderController@SauvgarderSlider');
Route::get('/activer/{id}','ProduitController@ActiverProduit');
Route::get('/desactiver/{id}','ProduitController@DesactiverProduit');
Route::get('/activer-slider/{id}','SliderController@ActiverSlider');
Route::get('/desactiver-slider/{id}','SliderController@DesactiverSlider');
Route::get('/modifier-categorie/{id}','AdminController@ModifierCategorie');
Route::post('/sauvgarder-edited-categorie','CategorieController@SauvgarderEditedCategorie');
Route::get('/modifier-produit/{id}','AdminController@ModifierProduit');
Route::post('/sauvgarder-edited-produit','ProduitController@SauvgarderEditedProduit');
Route::get('/modifier-slider/{id}','AdminController@ModifierSlider');
Route::post('/sauvgarder-edited-slider','SliderController@SauvgarderEditedSlider');
Route::get('/supprimer-produit/{id}','ProduitController@SupprimerProduit');
Route::get('/supprimer-categorie/{id}','CategorieController@SupprimerCategorie');
Route::get('/supprimer-slider/{id}','SliderController@SupprimerSlider');
Route::post('/modifier-quantite','ClientController@ModifierQuantite');
Route::get('/supp-article/{id}','ClientController@SupprimerArticle');
Route::post('/payement-panier','ClientController@PayementPanier');

Route::get('/voir-pdf/{id}','AdminController@GeneratePDF');









